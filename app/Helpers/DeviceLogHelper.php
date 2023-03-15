<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Http;

class DeviceLogHelper{

    public static function deviceLog($apiURL){

        $headers = [
            'Accept' => 'application/json',
        ];

        $response = Http::withHeaders($headers)->get($apiURL);
        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);
        return $responseBody;
    }
}



?>
