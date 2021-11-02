<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\WeatherFetcher;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/currency', function () {
    return  Http::get('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
});


/* Weather */
Route::get('/weatherkyiv', function () {
    return view('weatherKyiv');
});

Route::get('/weather/{city}', function ($city) {

    return  (new WeatherFetcher)->outputWeather($city);
});

Route::get('/weathercities', function () {
    return  view('weather');
});

Route::get('/weathercity', function () {
    $weatherOutput = 'No weather details here.';
    if (isset($_GET['cityselect'])) {
        $weatherOutput = (new WeatherFetcher)->outputWeather($_GET['cityselect']);
    }

    return $weatherOutput;
});
