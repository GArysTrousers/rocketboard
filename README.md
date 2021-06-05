# 🚀RocketBoard
## What is this?
RocketBoard is a simple digital signage system.

__*File system backend, Browser based frontend.*__

## Features
- Display images on rotation.
- Manage boards with file explorer.
- One server, multiple boards.
- Customizable overlay with:
  - Time ⌚
  - Date 📆
  - Tempreture 🌡

## How do I use it?
There's a few things you'll need to understand to make use of 🚀RocketBoard.

- In the webroot, there is a folder called "boards".
- Making a folder inside "boards" creates a board with that name.
- A board will show whatever images are in its folder.
- To display a board, just open a browser to:

      http://[server ip or hostname]/?=[board name]

## How do I customise it?
Feel free to modify the the project however you like, but there is a few built in ways to customise your boards.

- "settings.js" in the root directory contains the default settings for the boards.
- You can create a "settings.js" file in a board folder to override settings for that board, such as:

      settings.slick.autoplaySpeed = 1000;

## Settings
This is the settings object that serves as the defaults for all the boards.
``` javascript
const settings = {
  clock: {
    enabled: true|false,
    position: 'top-left|top-right|bottom-left|bottom-right',
    showTime: true|false,
    showDate: true|false,
  },
  weather: {
    enabled: true|false,
    position: 'top-left|top-right|bottom-left|bottom-right',
    options: {
      type: "weather",
      cityName: "Melbourne",
      units: "metric|standard|imperial"
    }
  },
  slick: {
    autoplaySpeed: 5000, // milliseconds per slide
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    centerMode: false,
    arrows: false,
    pauseOnHover: false,
  }
}
```
## File Structure
```
/
  index.php   <- main page
  settings.js <- default settings
  boards/     <- share this on network
    Board1/   <- board name
      ...
      image.png  <- images on Board1
      ...
    Board2/   <- board name
      settings.js <- override settings
      ...
      image.png  <- images on Board2
      ...
  api/
    weather.php  <- put api key here
```

## Who made this?
Ben made this.

with:
- [PHP](https://www.php.net/)
- [jQuery](https://jquery.com/)
- [Slick](https://kenwheeler.github.io/slick/)
- [Open Weather Map](https://openweathermap.org/)
- [Parsedown](https://parsedown.org/)

## Future Plans
- Add weather forcast slide
- Replace the page refresh with something more elegant