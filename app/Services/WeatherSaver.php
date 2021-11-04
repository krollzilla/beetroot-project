<?php

namespace App\Services;

use App\Models\Cities;
use App\Models\Weather;
use Exception;

class WeatherSaver
{
    public function getCityID(string $city)
    {
        $cityId = Cities::select('id')->where('city', $city)->get();
        $cityId = $cityId->toArray();

        if (empty($cityId[0]["id"])) {
            throw new Exception('Error while inserting data to DB: no city was found'.PHP_EOL);
        }

        return $cityId[0]["id"];
    }

    public function addWeatherToDB(array $weathers): string
    {
        foreach ($weathers as $weather) {
            $city = $weather["city"];
            $cityId = $this->getCityID($city);

            $weatherData = new Weather;

            $weatherData->city_id = $cityId;
            $weatherData->temperature = $weather["temperature"];
            $weatherData->humidity = $weather["humidity"];
            $weatherData->pressure = $weather["pressure"];
            $weatherData->wind_speed = $weather["wind"];

            $weatherData->save();

            if (empty($weatherData->id)) {
                throw new Exception('Error while inserting data to DB'.PHP_EOL);
            }
        }

        return 'Data inserted in DB'.PHP_EOL;
    }
}
