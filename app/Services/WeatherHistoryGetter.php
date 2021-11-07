<?php

namespace App\Services;

use App\Models\Cities;
use App\Models\Weather;
use Exception;

class WeatherHistoryGetter
{
    public function getCityID(string $city)
    {
        $cityId = Cities::select('id')->where('city', $city)->get();
        $cityId = $cityId->toArray();

        if (empty($cityId[0]["id"])) {
            throw new Exception('No city'.PHP_EOL);
        }

        return $cityId[0]["id"];
    }

    public function getWeatherHistory(string $city)//: string
    {
        $cityId = $this->getCityID($city);

        $weatherHistory = Weather::select('*')->where('city_id', $cityId)->get();
        $weatherHistory = $weatherHistory->toArray();
        $weatherCityHistory = [];
        foreach ($weatherHistory as $weather) {
            $weatherCityHistory[] = [
                'city' => $city,
                'temperature' => $weather['temperature'],
                'humidity' => $weather['humidity'],
                'pressure' => $weather['pressure'],
                'wind' => $weather['wind_speed'],
                'created_at' => $weather['created_at'],
            ];

        }
        return $weatherCityHistory;
    }
}
