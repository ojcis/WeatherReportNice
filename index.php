<?php

require_once 'vendor/autoload.php';

use App\ApiClient;
use Carbon\Carbon;

const API_KEY='';//ad your key!

$apiClient=new ApiClient(API_KEY);
$weather = $apiClient->getWeather($_GET['city'] ?? 'Riga');

$time=Carbon::now();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>weather</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<p class="time"><?php echo $time ?></p>
<h1 class="title">
    Weather report in <?php echo $weather->getLocationName() ?>
</h1>

<div class="box-container">
    <div class="box box1 text">
        <button class="button">
            <a href="/?city=Riga">Riga</a><br>
        </button><br>
        <button class="button">
            <a href="/?city=Tallinn">Tallinn</a><br>
        </button><br>
        <button class="button">
            <a href="/?city=Vilnius">Vilnius</a><br>
        </button><br>
    </div>
    <div class="box box2 text">
        temperature is <?php echo $weather->getTemperature() ?> °C <br>
        feels like <?php echo $weather->getTemperatureFeelsLike() ?> °C <br>
        humidity is <?php echo $weather->getHumidity() ?> % <br>
        wind speed is <?php echo $weather->getWindSpeed() ?> m/s <br>
    </div>
    <div class="box box3 text">
        <img src="<?php echo $weather->getWeatherIcon() ?>" alt="image" width="140">
    </div>
    <div class="box box4">
        <form>
            <label for="city">Search:</label>
            <input type="text" id="city" name="city" placeholder="city name">
        </form>
    </div>
</div>
</body>
</html>

