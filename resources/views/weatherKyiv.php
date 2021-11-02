<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weather</title>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    <p>
        <?php
        use App\Http\Controllers\WeatherFetcher;

        $city = 'Kyiv';
        echo((new WeatherFetcher)->outputWeather($city));?>
    </p>
    </body>
</html>
