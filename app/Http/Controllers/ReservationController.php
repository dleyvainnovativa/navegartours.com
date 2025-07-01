<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class ReservationController extends Controller
{

    public static function importReservations()
    {
        $url = "https://1drv.ms/x/c/6a1ff89bbe2d68d1/EdFoLb6b-B8ggGopBAAAAAABpx50RKOOL2CWaz2IrmXjXg?download=1";

        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
        ])->get($url);

        if ($response->failed()) {
            return response()->json(['error' => 'Download failed. Status: ' . $response->status()], 500);
        }
        Storage::put('excel/reservations.xlsx', $response->body());
    }


    private static function getSheetContent($monthNum, $year, $limit = null)
    {
        $reservations = [];
        $filePath = storage_path('app/private/excel/reservations.xlsx');



        $months = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ];

        $monthName = $months[$monthNum];

        $startLabel = strtolower(trim("$monthName $year"));

        $reader = IOFactory::createReaderForFile($filePath);
        $spreadsheet = $reader->load($filePath);
        $sheetNames = $spreadsheet->getSheetNames();


        $normalizedSheetNames = array_map(function ($name) {
            return strtolower(trim($name));
        }, $sheetNames);

        $startIndex = null;
        foreach ($normalizedSheetNames as $i => $sheetName) {
            if ($sheetName === $startLabel) {
                $startIndex = $i;
                break;
            }
        }

        if ($startIndex === null) {
            return [];
        }

        if ($limit == "all") {
            $selectedSheets = array_slice($sheetNames, $startIndex, sizeof($sheetNames));
        } else {
            $selectedSheets = array_slice($sheetNames, $startIndex, 1);
        }
        $reader->setLoadSheetsOnly($selectedSheets);
        $spreadsheet = $reader->load($filePath);

        foreach ($selectedSheets as $sheetName) {
            $worksheet = $spreadsheet->getSheetByName($sheetName);
            $data = $worksheet->toArray();


            $reservation["sheet"] = $sheetName;
            $reservation["data"] = $data;

            array_push($reservations, $reservation);
        }
        return $reservations;
    }

    public static function getReservations($month = null, $year = null, $limit = null)
    {
        if ($month && $year) {
            $limit = null;
        } else {
            $month = date('n');
            $year = date('Y');
            $limit = "all";
        }

        $sheets = self::getSheetContent($month, $year, $limit);
        $reservations = [];
        foreach ($sheets as $key => $sheet) {
            $currentDate = null; // <== store the last valid date

            foreach ($sheet["data"] as $key2 => $row) {
                if (isset($row[0]) &&  isset($row[1]) && isset($row[2]) && isset($row[3])) {
                    if ($row[3] != null && $key2 != 0) {

                        // 1) If the date cell has a value, parse it and update currentDate
                        if (!empty($row[1])) {
                            $dateObj = \DateTime::createFromFormat('n/j/Y', $row[1]);
                            $currentDate = $dateObj ? $dateObj->format('Y-m-d') : null;
                        }
                        // If no date cell, $currentDate remains as is

                        // 2) Process time
                        $timeRange = $row[2];
                        preg_match('/(\d{1,2}:\d{2})(am|pm)[\s\-]+(\d{1,2}:\d{2})(am|pm)/i', $timeRange, $matches);
                        if ($matches) {
                            $startTimeObj = \DateTime::createFromFormat('g:ia', $matches[1] . $matches[2]);
                            $start_time = $startTimeObj ? $startTimeObj->format('H:i') : null;

                            $endTimeObj = \DateTime::createFromFormat('g:ia', $matches[3] . $matches[4]);
                            $end_time = $endTimeObj ? $endTimeObj->format('H:i') : null;
                        } else {
                            $start_time = null;
                            $end_time = null;
                        }
                        $boat = $row[3];
                        $reservation = [
                            "sheet" => $sheet["sheet"],
                            "date" => $currentDate, // <== always use currentDate
                            "start_time" => $start_time,
                            "end_time" => $end_time,
                            "boat" => $boat,
                        ];
                        $reservations[] = $reservation;
                    }
                }
            }
        }
        return $reservations;
    }

    public static function getDatesFromBoat($boat, $dates)
    {
        $reservations = [];
        foreach ($dates as $key => $date) {
            $name = $date["boat"];

            $boatName = strtolower($boat);
            $name = strtolower($name);

            // Extract brand and number
            $parts = explode(' ', $name);
            $brand = $parts[0] ?? '';
            $number = $parts[1] ?? '';

            // Check both substrings
            $match = strpos($boatName, $brand) !== false && strpos($boatName, $number) !== false;

            if ($match) {
                array_push($reservations, $date);
            }
        }
        return $reservations;
    }
}
