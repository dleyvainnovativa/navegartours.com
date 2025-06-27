<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $boats = getJsonData("boats2.json");
        $routes = getJsonData("routes2.json");
        $experiences = getJsonData("experiences.json");

        $today = date('Y-m-d');


        $data["today"] = $today . " 07:00";
        $data["boats"] = $boats;
        $data["routes"] = $routes;
        $data["experiences"] = $experiences;

        return view("home", $data);
    }
}
