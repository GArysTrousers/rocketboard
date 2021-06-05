<?php

$apikey = 'your_openweathermap.org_apikey_here';

$type = isset($_POST['type']) ? $_POST['type'] : 'error';

switch ($type) {
  case 'weather':
    $cityName = isset($_POST['cityName']) ? $_POST['cityName'] : 'Melbourne';
    $units = isset($_POST['units']) ? $_POST['units'] : 'metric';

    $url = sprintf(
      'api.openweathermap.org/data/2.5/weather?q=%s&units=%s&appid=%s',
      $cityName,
      $units,
      $apikey
    );

    $json = http($url);
    break;

  default:
    $json = json_encode(['cod' => '400']);
    break;
}

echo $json;



function http($url)
{
  $session = curl_init($url);
  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
  return curl_exec($session);
}
