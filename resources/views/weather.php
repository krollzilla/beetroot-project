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
    <form method="GET" action="/weathercity">
        <select name="cityselect">
            <option VALUE="Kyiv"> Kyiv</option>
            <option VALUE="Odessa"> Odessa</option>
            <option VALUE="Lviv"> Lviv</option>
            <option VALUE="Lutsk"> Lutsk</option>
        </select>
        <INPUT TYPE="submit" name="submit" value="Enter" />
    </form>
    </body>
</html>
