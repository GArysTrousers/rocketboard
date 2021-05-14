# 🚀RocketBoard
## What is this?
RocketBoard is a simple digital signage system.

__*File system backend, Browser based frontend.*__

## How do I use it?
There's a few things you'll need to understand to make use of 🚀RocketBoard.

- In the webroot, there is a folder called "boards".
- Making a folder inside "boards" creates a board with that name.
- A board will show whatever images are in its folder.
- To display a board, just open a browser to:

      http://[server ip or hostname]/?=[board name]

## How do I customise it?
Feel free to modify the the project however you like, but there is a few built in ways to customise your boards.

- "settings.js" in the webroot contains the settings for slick (the carousel library) and any other future js settings.
- You can also create a new "settings.js" file in a board folder to override settings for that board, such as:

      settings.slickOptions.autoplaySpeed = 1000;

## Who made this?
Ben made this.

with:
- [PHP](https://www.php.net/)
- [Bootstrap](https://getbootstrap.com/)
- [jQuery](https://jquery.com/)
- [Slick](https://kenwheeler.github.io/slick/)