//these are the default settings for every board
//you can place a settings.js file in a board dir to override these settings

const settings = {
  slickOptions: {
    autoplaySpeed: 5000, //how many milliseconds to spend on each slide
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    centerMode: false,
    arrows: false,
    pauseOnHover: false,
  }
}

//change settings on a specific board, add a settings.js file with reassignments like:
//settings.slickOptions.autoplaySpeed = 1000;