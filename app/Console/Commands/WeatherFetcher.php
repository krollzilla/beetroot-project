<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WeatherClient;


class WeatherFetcher extends Command
{
    protected $signature = 'weather:fetch';
    protected $description = 'Fetch the weather for particular city.';

    public function handle(): void
    {
        $weather= (new WeatherClient)->getWeatherDetails();
        $this->output->table(
            ['City', 'Temperature, °C', 'Humidity, %', 'Pressure, mm Hg', 'Wind, m/s'],
            $weather
        );
    }
}
