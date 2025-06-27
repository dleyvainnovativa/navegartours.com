<?php

use Illuminate\Support\Facades\File;

if (!function_exists('ErrorResponse')) {
    function ErrorResponse($code = 400, $message = 'Mensaje de error por default', $location = null, $data = null)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'location' => $location,
            'data' => $data,
        ], $code);
    }
}
if (!function_exists('SuccessResponse')) {
    function SuccessResponse($code = 200, $message = 'Mensaje exitoso por default', $location = null, $data = null)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'location' => $location,
            'data' => $data,
        ], $code);
    }
}
if (!function_exists('getJsonData')) {
    function getJsonData($file = null)
    {
        $path = resource_path("json/$file");
        if (!File::exists($path)) {
            abort(404, 'Data file not found.');
        }
        $jsonContent = File::get($path);
        $data = json_decode($jsonContent, true);
        return $data;
    }
}
