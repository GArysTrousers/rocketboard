<?php
function myUrlEncode($string)
{
  return str_replace(['+'], ['%20'], urlencode($string));
}

function rocketBoard($name, $boardDir)
{
  $dir = $boardDir . $name;

  $output = '<div id="div-images">';

  $files = glob($dir . '/*.*');
  foreach (preg_grep('/\.(png|jpg|jpeg|bmp|gif|webp)$/i', $files) as $filename) {
    $output .= sprintf('<div class="div-image" style="background-image: url(boards/%s/%s)"></div>',  myUrlEncode($name), myUrlEncode(basename($filename)));
  }

  $output .= '</div>';

  $output .= /*html */'
    <div id="top-left" class="overlay"></div>
    <div id="top-right" class="overlay"></div>
    <div id="bottom-left" class="overlay"></div>
    <div id="bottom-right" class="overlay"></div>

    <div id="div-clock">
      <div id="div-time"></div>
      <div id="div-date"></div>
    </div>
    <div id="div-weather"></div>';
  
  $output .= '
    <script src="assets/libs/slick.min.js"></script>
    <script src="settings.js"></script>';

  if (file_exists($dir . '/settings.js'))
    $output .= sprintf('<script src="boards/%s/settings.js"></script>', myUrlEncode($name));

  $output .= '
    <script src="assets/js/date.js"></script>
    <script src="assets/js/rocketboard.js"></script>';

  return $output;
}
