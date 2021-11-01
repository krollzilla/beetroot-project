<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;


class WeatherGetter extends Command
{

    protected $signature = 'weather:get {city*}';
    protected $description = 'Command that gets current weather';

    public function handle()
    {
        //$city = $this->ask('What city?');
        $cities = $this->arguments();
        foreach ($cities["city"] as $city) {
            $weatherDetails = $this->getWeatherDetails($city);
            $formattedWeather = $this->getFormattedWeather($weatherDetails, $city);
            $this->output->info($formattedWeather);
        }
    }

    private function getFormattedWeather(array $weatherDetails, $city): string
    {
        $out = "Weather in $city:\n";
        $out .= "Temperature: {$weatherDetails['main']['temp']} °C\n";
        $out .= "Humidity: {$weatherDetails['main']['humidity']}\n";
        $out .= "Pressure: {$weatherDetails['main']['pressure']}\n";
        $out .= "Wind: {$weatherDetails['wind']['speed']}\n";

        return $out;
    }

    private function getWeatherDetails($city): array
    {
        //var_dump($city);
        $apiKey = config('app.openweathermap_app');
        $request = Http::get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric");
        if (!isset($request["weather"])) {
            $this->error("Invalid city or connection failed.");
        }

        return json_decode($request->body(), true);;
    }
}
