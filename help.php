<?php
include $_SERVER['DOCUMENT_ROOT'] . '/assets/php/global.php';
include $ROOT . '/assets/php/Parsedown.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>RocketBoard</title>
  <?php include 'assets/php/head.php' ?>
  <link rel="stylesheet" href="assets/css/style-rocketboard.css" />
</head>

<body>
  <a class="btn btn-gray m-1 position-fixed" href="/">Back</a>
  <div class="d-flex justify-content-center  m-1">
    <div class="max-w-5xl mx-5">
      <?php
      $readme = file_get_contents('README.md');
      $Parsedown = new Parsedown();
      echo $Parsedown->text($readme);
      ?>
    </div>
  </div>

</body>

</html>