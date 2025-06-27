<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class BoatController extends Controller
{
    public function get($boat_id)
    {
        try {
            $boats = getJsonData("boats2.json");
            $routes = getJsonData("routes2.json");
            $included = getJsonData("included.json");
            $experiences = getJsonData("experiences.json");
            $today = date('Y-m-d');



            $flag = false;
            $data = [];
            foreach ($boats as $key => $boat) {
                if ($boat_id == $boat["id"]) {
                    $boat["routes"] = $routes;
                    $boat["included"] = $included;
                    $boat["experiences"] = $experiences;
                    $boat["dates"] = [];
                    $data["boat"] = $boat;
                    $data["today"] = $today . " 07:00";
                    $flag = true;
                }
            }
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

            $date = $validate["date"];
            $capacity = $validate["capacity"];
            $boats = [];

            $boats_list = getJsonData("boats2.json");
            $flag = false;
            $data = [];

            foreach ($boats_list as $key => $boat) {
                if ($capacity <= $boat["capacity"]) {
                    array_push($boats, $boat);
                }
            }
            $data["boats"] = $boats;
            return view('search', $data);
        } catch (Exception $e) {
            return $e;
        }
    }
}
