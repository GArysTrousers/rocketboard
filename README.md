# 🚀RocketBoard
## What is this?
🚀RocketBoard is a simple digital signage system.

__*File system backend, Browser based frontend.*__

## Features
- Display images on rotation.
- Manage boards with file explorer.
- One server, unlimited boards.
- Customisable overlay with:
  - Time ⌚
  - Date 📆
  - Tempreture 🌡

## How do I use it?

- You'll need a webserver with PHP like [XAMPP](https://www.apachefriends.org/download.html).
- Place the project files in the webroot.
- Making a folder inside the "boards" folder creates a board with that name.
- A board will show whatever images are in its folder.
- To display a board, just open a browser to:

      http://[server address]/?board=[board name]
Note: To use the weather feature you'll need to get an API key from [Open Weather Map](https://openweathermap.org/), and put it in /api/weather.php.

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

## How do I customise it?
Feel free to modify the the project however you like, but there is a few built in ways to customise your boards.

- The "settings.js" file in the webroot contains the default settings for the boards.
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
