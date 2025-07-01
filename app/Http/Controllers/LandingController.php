<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $boats = BoatController::getAll();
        $routes = getJsonData("routes.json");
        $experiences = getJsonData("experiences.json");
        $reviews = getJsonData("reviews.json");

        $today = new DateTime(); // now
        $max = clone $today;
        $max->modify('+1 year');

        $data["today"] = $today->format('Y-m-d') . " 07:00";
        $data["max"] = $max->format('Y-m-d') . " 21:00";

        // $data["today"] = $today . " 07:00";
        $data["boats"] = $boats;
        $data["routes"] = $routes;
        $data["experiences"] = $experiences;
        $data["reviews"] = $reviews;

        return view("home", $data);
    }
}
