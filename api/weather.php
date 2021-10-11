<?php

$apikey = 'your_openweathermap.org_apikey_here';

// Proxy (address:port)
$proxy = '';
// If using auth (username:password)
$proxyCreds = '';

$type = isset($_POST['type']) ? $_POST['type'] : 'error';

switch ($type) {
  case 'weather':
    $cityName = isset($_POST['cityName']) ? $_POST['cityName'] : 'Melbourne, AU';
    $units = isset($_POST['units']) ? $_POST['units'] : 'metric';

    $cacheName = sprintf("weather_cache\\%s+%s", $cityName, $units);
    if (file_exists($cacheName)) {
      $cache = file($cacheName); //read cache
      if (time() - intval($cache[0]) < 60) { //if cache is still young
        //use cache
        $json = $cache[1];
        break;
      }
    }
    
    //get fresh data
    $url = sprintf(
      'api.openweathermap.org/data/2.5/weather?q=%s&units=%s&appid=%s',
      $cityName,
      $units,
      $apikey
    );
    $session = curl_init($url);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
    if ($proxy != '') {
      curl_setopt($session, CURLOPT_PROXY, $proxy);
      if ($proxyCreds != '') {
        curl_setopt($session, CURLOPT_PROXYUSERPWD, $proxyCreds);
      }
    }
    $json = curl_exec($session);
    
    //if successful, save data in cache with timestamp
    $data = json_decode($json);
    if ($data['cod'] == '200') {
      $cacheFile = fopen($cacheName, 'w');
      fwrite($cacheFile, sprintf("%s\n%s", time(), $json));
    }
    
    break;

  default:
    $json = json_encode(['cod' => '400']);
    break;
}

echo $json;


