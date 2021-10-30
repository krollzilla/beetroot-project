<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class getWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get_weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command that gets current weather';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $apiKey = '9136fc5b02978cb12c98fa4474d17999';
        $city = $this->ask('What city?');
        $request = Http::get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey");
        if (!isset($request["weather"])) {
            $this->error("Invalid city or connection failed.");

            return Command::FAILURE;
        }

        $weather = $request["weather"][0]["description"];
        $temperature = $request["main"]["temp"];
        $pressure = $request["main"]["pressure"];
        $humidity = $request["main"]["humidity"];
        $this->info(
            "$city weather:".PHP_EOL.
            "$weather;".PHP_EOL.
            "current temperature: $temperature °F;".PHP_EOL.
            "current pressure: $pressure;".PHP_EOL.
            "current humidity: $humidity;".PHP_EOL
        );

        return Command::SUCCESS;
    }
}
