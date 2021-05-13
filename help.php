<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/php/global.php' ?>
<!DOCTYPE html>
<html>

<head>
  <title>RocketBoard</title>
  <?php include 'assets/php/head.php' ?>
  <link rel="stylesheet" href="assets/css/style-board.css" />
  <link rel="stylesheet" href="assets/libs/slick.min.css" />
</head>

<body>
  <a class="btn btn-dark m-1 position-fixed" href="/">Back</a>

  <div class="d-flex justify-content-center pt-5">
    <div class="max-w-5xl">
      <h1 class="mb-5">🚀RocketBoard Help</h1>
      <div class="my-5">
        <h3>What is this?</h3>
        <p>RocketBoard is a simple browser based digital signage system.</p>
      </div>
      <div class="my-5">
        <h3>How do I use it?</h3>
        <p>There's a few things you'll need to understand to make use of 🚀RocketBoard.</p>
        <ul>
          <li>In the webroot, there is a folder called "boards".</li>
          <li>Making a folder inside "boards" creates a board with that name.</li>
          <li>A board will show whatever images are in its folder.</li>
          <li>To display a board, just open a browser to: <br /><br /><span class="font-monospace">http://[server ip or hostname]/?=[board name]</span></li>
        </ul>
      </div>
      <div class="my-5">
        <h3>How do I customise it?</h3>
        <p>Feel free to modify the the project however you like, but there is a few built in ways to customise your boards.</p>
        <ul>
          <li>"settings.js" in the webroot contains the settings for slick, the carousel library (<a href="https://kenwheeler.github.io/slick/">docs</a>).</li>
          <li>You can also create a new "settings.js" file in a board folder to override settings for that board, such as:<br><br>
            <span class="font-monospace">settings.slickOptions.autoplaySpeed = 1000;</span><br><br>
          </li>
        </ul>
      </div>
      <div class="my-5">
        <h3>Who made this?</h3>
        <p>Ben made this.<br><br>with:</p>
        <ul>
          <li><a href="https://www.php.net/">PHP</a></li>
          <li><a href="https://getbootstrap.com/">Bootstrap</a></li>
          <li><a href="https://jquery.com/">jQuery</a></li>
          <li><a href="https://kenwheeler.github.io/slick/">Slick</a></li>
        </ul>
      </div>

    </div>
  </div>
</body>

</html>