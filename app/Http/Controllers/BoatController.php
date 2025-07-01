<?php

namespace App\Http\Controllers;

use DateTime;
use Exception;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class BoatController extends Controller
{
    public static function getAll()
    {
        $boats = getJsonData("boats.json");
        usort($boats, function ($a, $b) {
            return $a['length'] <=> $b['length'];
        });


        return $boats;
    }
    public function get($boat_id)
    {
        try {
            $boats = self::getAll();
            $routes = getJsonData("routes.json");
            $included = getJsonData("included.json");
            $experiences = getJsonData("experiences.json");
            $today = date('Y-m-d');

            ReservationController::importReservations();
            $reservations = ReservationController::getReservations();

            // return json_encode($reservations);



            $flag = false;
            $data = [];
            foreach ($boats as $key => $boat) {
                if ($boat_id == $boat["id"]) {
                    $boat_name = $boat["name"] . " " . $boat["length"];
                    $boat["routes"] = $routes;
                    $boat["included"] = $included;
                    $boat["experiences"] = $experiences;
                    $data["reservations"] = ReservationController::getDatesFromBoat($boat_name, $reservations);
                    // $data["reservations"] = $reservations;
                    $boat["dates"] = [];
                    $data["boat"] = $boat;
                    $data["today"] = $today . " 07:00";
                    $flag = true;
                }
            }

            // dd($data);

            if ($flag) {
                return view('boat', $data);
            } else {
                return "error";
                // return view('errors/404');
            }
        } catch (Exception $e) {

            return $e;
            // return view('errors/404');
        }
    }
    public function search(Request $request)
    {
        try {

            $validate = $request->validate([
                'date' => 'required|string|max:255',
                'capacity' => 'required|int',
            ]);
            ReservationController::importReservations();

            $datetimeString = $validate["date"];


            $date = new DateTime($datetimeString);
            $month = (int) $date->format('m');   // "06"
            $year = $date->format('Y');    // "2025"
            $hour = $date->format('H');    // "07"

            $date_format = $date->format('Y-m-d');
            $time = $date->format('H:i');  // "00"

            $reservations = ReservationController::getReservations($month, $year);
            $day_reservations = [];

            foreach ($reservations as $key => $day) {
                $start_time = $day["start_time"];
                $end_time = $day["end_time"];
                $baseDate = $day["date"];

                $timeDT = new DateTime($baseDate . ' ' . $time);
                $startDT = new DateTime($baseDate . ' ' . $start_time);
                $endDT = new DateTime($baseDate . ' ' . $end_time);
                $startDT->modify('-4 hours');


                if ($day["date"] == $date_format) {
                    if ($timeDT >= $startDT && $timeDT <= $endDT) {
                        array_push($day_reservations, $day);
                    }
                }
            }
            // dd($day_reservations);
            $capacity = $validate["capacity"];
            $boats = [];

            $boats_list = self::getAll();
            $flag = false;
            $data = [];

            foreach ($boats_list as $key => $boat) {
                $boat["validation"] = 0;

                if ($capacity <= $boat["capacity"]) {
                    $boat_name = $boat["name"] . " " . $boat["length"];
                    $boat_reservations = ReservationController::getDatesFromBoat($boat_name, $day_reservations);
                    $boat["reservations"] = $boat_reservations;
                    if (sizeof($boat_reservations) == 0) {
                        array_push($boats, $boat);
                    }
                }
            }
            $data["boats"] = $boats;
            // dd($data);
            return view('search', $data);
        } catch (Exception $e) {
            return $e;
        }
    }
}
