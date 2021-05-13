<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'];
$BOARDS_DIR = $ROOT . '/boards/';

function myUrlEncode($string)
{
  return str_replace(['+'], ['%20'], urlencode($string));
}
