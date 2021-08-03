<?php 

require 'config.php';

// Intialize WeatherApi 
$weatherApi = new System\Weather\WeatherApi;

// Intialize Weather Repository 
$weatherRepository = new App\repositories\WeatherRepository;