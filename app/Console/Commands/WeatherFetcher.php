<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WeatherClient;
use App\Services\WeatherSaver;

class WeatherFetcher extends Command
{
    protected $signature = 'weather:fetch';
    protected $description = 'Fetch the weather for particular city.';

    public function handle(): void
    {
        $weather = (new WeatherClient)->getWeatherDetails();

        $this->output->table(
            ['City', 'Temperature, °C', 'Humidity, %', 'Pressure, mm Hg', 'Wind, m/s'],
            $weather
        );

        echo (new WeatherSaver)->addWeatherToDB($weather);
    }
}
