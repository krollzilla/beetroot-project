<?php

namespace App\Console\Commands;

use App\Services\WeatherHistoryGetter;
use Illuminate\Console\Command;
use App\Services\WeatherClient;
use App\Services\WeatherSaver;

class WeatherFetcherHistory extends Command
{
    protected $signature = 'weather:get{city}';
    protected $description = 'Fetch the weather history for particular city.';

    public function handle(): void
    {
        $city = $this->argument('city');
        $weatherHistory = (new WeatherHistoryGetter())->getWeatherHistory($city);
var_dump($weatherHistory);
        /*$this->output->table(
            ['City', 'Temperature, °C', 'Humidity, %', 'Pressure, mm Hg', 'Wind, m/s', 'Date and time'],
            $weatherHistory
        ); */
    }
}
