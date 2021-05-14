<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/php/global.php' ?>
<!DOCTYPE html>
<html>


<?php
$boardName = isset($_GET['board']) ? $_GET['board'] : '';
?>

<head>
  <title><?php echo $boardName == '' ? "RocketBoard" : $boardName ?></title>
  <?php include 'assets/php/head.php' ?>
  <link rel="stylesheet" href="assets/css/style-board.css" />
  <link rel="stylesheet" href="assets/libs/slick.min.css" />
</head>

<body>
  <?php

  //boards page
  if ($boardName == '') {
    
    echo '<a class="btn btn-dark m-1 position-fixed" href="help.php">?</a>';
    echo '
    <div class="d-flex justify-content-center align-items-center text-center h-screen">
      <div>
        <h1>🚀RocketBoard</h1>
        <div class="flex-row flex-wrap max-w-lg">';

    foreach (glob($BOARDS_DIR . "*") as $board) {
      if (is_dir($board)) {
        $name = basename($board);
        echo sprintf('<a class="btn btn-primary m-1" href="./?board=%s">%s</a>', $name, $name);
      }
    }

    echo '</div>
      </div>
    </div>';

    //if board doesn't exist
  } elseif (!file_exists($BOARDS_DIR . $boardName)) {
    echo /*html*/ '
    <div class="d-flex justify-content-center align-items-center text-center h-screen">
      <div class=""><h1>I could not find that board 😥</h1><br/><a class="btn btn-primary" href="/">Back to Board List</a></div>
    </div>';

    //show board
  } else {
    echo '<div id="div-images">';

    $files = glob($BOARDS_DIR . $boardName . '/*.*');
    foreach (preg_grep('/\.(png|jpg|jpeg|bmp|gif|webp)$/i', $files) as $filename) {
      echo sprintf('<div class="div-image" style="background-image: url(/boards/%s/%s?rand=%d)"></div>', myUrlEncode($boardName), myUrlEncode(basename($filename)), rand());
    }

    echo '</div>';

    echo '<script src="assets/libs/slick.min.js"></script>';
    echo '<script src="settings.js"></script>';
    if (file_exists($BOARDS_DIR . $boardName . '/settings.js'))
      echo sprintf('<script src="boards/%s/settings.js"></script>', myUrlEncode($boardName));
    echo '<script src="assets/js/board.js"></script>';
  }
  ?>

  <div class="modal" id="modal-msg" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body text-center">
          <h1 id="modal-msg-heading"></h1>
          <p id="modal-msg-body"></p>
        </div>
      </div>
    </div>
  </div>

</body>
</html>