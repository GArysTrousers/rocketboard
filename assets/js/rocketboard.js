//this requires at least one settings.js to run

$(document).ready(function () {
  try {
    // 'afterChange' event won't trigger if there is less than 2 images, so set a timer to refresh
    if ($('#div-images').children().length < 2) {
      console.log("FUCK");
      setTimeout(() => {
        location.reload()
      }, settings.slick.autoplaySpeed);
    }

    //init slick carousel
    $('#div-images').slick(settings.slick);

    //refresh at end of carousel
    $('#div-images').on('afterChange', (event, slick, currentSlide) => {
      if (currentSlide == 0) {
        location.reload();
      }
    })
  } catch (err) {
    alert(err);
    setTimeout(() => {
      location.reload()
    }, 5000);
  }

  if (settings.clock.enabled) {
    $('#div-clock').appendTo('#' + settings.clock.position);
    updateClock();
  }

  if (settings.weather.enabled) {
    $('#div-weather').appendTo('#' + settings.weather.position);
    updateWeather();
  }
});

function updateClock() {
  const date = new Date();
  if (settings.clock.showTime)
    $('#div-time').html(formatDate(date, '[time12][ampm]'));
  if (settings.clock.showDate)
    $('#div-date').html(formatDate(date, '[DOW], [d] [MM]'));

  setTimeout(() => {
    updateClock();
  }, 5000);
}

async function updateWeather() {
  const data = await fetchData('api/weather', settings.weather.options);

  switch (data.cod) {
    case 200:
      $('#div-weather').html(Math.round(data.main.temp) + '&degc');
      setTimeout(() => {
        updateWeather();
      }, 5000);
      break;
    case 400:
      $('#div-weather').html("Weather Error: Problem with request"); break;
    case 401:
      $('#div-weather').html("Weather Error: API key missing or incorrect"); break;
    case 404:
      $('#div-weather').html("Weather Error: City not found"); break;
  }
}

async function fetchData(url, data) {
  return await $.ajax({
    type: "POST",
    url: url,
    data: data,
    dataType: 'JSON'
  });
}