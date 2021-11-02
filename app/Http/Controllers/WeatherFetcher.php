<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WeatherFetcher extends Controller
{
    public function outputWeather($city)
    {
        $weatherDetails = $this->fetchWeather($city);

        return $this->getFormattedWeather($weatherDetails, $city);
    }

    private function fetchWeather($city)
    {
        $apiKey = config('app.openweathermap_app');
        $request = Http::get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric");

        return json_decode($request->body(), true);;
    }

    private function getFormattedWeather(array $weatherDetails, $city): string
    {

        $out = "Weather in $city:".'<br>';
        $out .= "Temperature: {$weatherDetails['main']['temp']} °C".'<br>';
        $out .= "Humidity: {$weatherDetails['main']['humidity']}".'<br>';
        $out .= "Pressure: {$weatherDetails['main']['pressure']}".'<br>';
        $out .= "Wind: {$weatherDetails['wind']['speed']}".'<br>';

        return $out;
    }
}
