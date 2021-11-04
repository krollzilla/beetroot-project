<?php

namespace App\Services;

use App\Models\Cities;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use App\Services\WeatherDTO;

class WeatherClient
{
    public function getCities(): array
    {
        $cityNames = [];
        foreach (Cities::all() as $city) {
            $cityNames[] = $city->city;
        }

        return $cityNames;
    }

    public function getWeatherDetails(): array
    {
        $cities = $this->getCities();
        $dataByCities = [];

        foreach ($cities as $city) {
            $url = sprintf(
                'api.openweathermap.org/data/2.5/weather?q=%s&appid=%s&units=metric',
                $city,
                config('app.openweathermap_app')
            );

            $response = Http::get($url);

            if ($response->status() !== Response::HTTP_OK) {
                throw new Exception("Invalid response: {$response->body()}");
            }

            $decodedResponse = json_decode($response->body(), true);
            $dto = new WeatherDTO($decodedResponse);
            $dto = $dto->toArray();
            $dataByCities[] = compact('city') + $dto;
        }

        return $dataByCities;
    }
}
