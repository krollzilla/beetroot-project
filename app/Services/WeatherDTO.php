<?php

namespace App\Services;

use Illuminate\Contracts\Support\Arrayable;

final class WeatherDTO implements Arrayable
{

    private $temperature;
    private $humidity;
    private $pressure;
    private $wind;
    private const DEFAULT_PRECISION = 1;

    public function __construct($weatherDetails)
    {
        $this->temperature = (int)$weatherDetails['main']['temp'];
        $this->humidity = (int)$weatherDetails['main']['humidity'];
        $this->pressure = (int)$weatherDetails['main']['pressure'];
        $this->wind = round($weatherDetails['wind']['speed'], self::DEFAULT_PRECISION);
    }

    public function toArray(): array
    {
        return [
            'temperature' => $this->temperature,
            'humidity' => $this->humidity,
            'pressure' => $this->pressure,
            'wind' => $this->wind,
        ];
    }
}
