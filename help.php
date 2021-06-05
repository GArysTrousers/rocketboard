<?php
include $_SERVER['DOCUMENT_ROOT'] . '/assets/php/global.php';
include $ROOT . '/assets/php/Parsedown.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>RocketBoard</title>
  <?php include 'assets/php/head.php' ?>
  <style>
    h1 {
      color: #e62828;
    }

    h2 {
      color: #00bcf0;
    }

    pre {
      font-size: larger;
      background-color: #222;
      padding: 0.75rem;
      border-radius: 0.25rem;
      border: 1px solid #333
    }
  </style>
</head>

<body>
  <a class="btn btn-gray m-1 position-fixed" href="/">Back</a>
  <div class="flex justify-content-center m-1">
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