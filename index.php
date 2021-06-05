<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/assets/php/global.php';
$boardName = isset($_GET['board']) ? $_GET['board'] : '';
?>
<!DOCTYPE html>
<html>

<head>
  <title><?php echo $boardName == '' ? "RocketBoard" : $boardName ?></title>
  <?php include 'assets/php/head.php' ?>
</head>

<body>
  <?php

  //boards page
  if ($boardName == '') {

    echo '<a class="btn btn-gray m-1 fixed" href="help.php">?</a>';
    echo /*html*/ '
    <div class="flex justify-content-center align-items-center text-center h-screen">
      <div>
        <h1>🚀<span class="red">Rocket</span>Board</h1>
        <div class="flex-row flex-wrap max-w-lg">';

    foreach (glob($BOARDS_DIR . "*") as $board) {
      if (is_dir($board)) {
        $name = basename($board);
        echo sprintf('<a class="btn btn-blue m-1" href="./?board=%s">%s</a>', $name, $name);
      }
    }

    echo /*html*/ '
        </div>
      </div>
    </div>';
  } elseif (!file_exists($BOARDS_DIR . $boardName)) {
    //if board doesn't exist
    echo '
    <div class="flex justify-content-center align-items-center text-center h-screen">
      <div class=""><h1>I couldn\'t find that board 😥</h1><br/><a class="btn btn-blue" href="/">Back to Board List</a></div>
    </div>';
  } else {
    //show board
    include_once $ROOT . '/assets/php/RocketBoard.php';
    echo rocketBoard($boardName, $BOARDS_DIR);
  }
  ?>

</body>

</html>