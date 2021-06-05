//these are the default settings for every board

const settings = {
  clock: {
    enabled: true,
    position: 'bottom-left',
    showTime: true,
    showDate: true,
  },
  weather: {
    enabled: true,
    position: 'bottom-left',
    options: {
      type: "weather",
      cityName: "Melbourne",
      units: "metric"
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

//change settings on a specific board, add a settings.js file with reassignments like:
//settings.slick.autoplaySpeed = 1000;