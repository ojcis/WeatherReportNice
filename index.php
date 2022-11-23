<?php

require_once 'vendor/autoload.php';

use App\ApiClient;

const API_KEY='cf60e647aafa33c963a3f5a489d1964b';

$selectedLocation=$_GET['city'] ?? 'Riga';

$apiClient=new ApiClient(API_KEY);
$weather = $apiClient->getWeather($selectedLocation);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>weather</title>
</head>
<body>
    <a href="/?city=Riga">Riga</a>
    <a href="/?city=Tallinn">Tallinn</a>
    <a href="/?city=Vilnius">Vilnius</a>
    <h1>
        Weather report in <?php echo $weather->getLocationName() ?>
    </h1>
    <p>
        temperature is <?php echo $weather->getTemperature() ?> °C <br>
        feels like <?php echo $weather->getTemperatureFeelsLike() ?> °C <br>
        humidity is <?php echo $weather->getHumidity() ?> % <br>
        wind speed is <?php echo $weather->getWindSpeed() ?> m/s <br>
        <img src="<?php echo $weather->getWeatherIcon() ?>">
    </p>
    <form>
        <label>Search </label>
        <input type="text" id="city" name="city" placeholder="city name">
    </form>
</body>
</html>
