//this requires at least one settings.js to run

$(document).ready(function () {
  try {
    // 'afterChange' event won't trigger if there is less than 2 images, so set a timer to refresh
    if ($('#div-images').children().length < 2) {
      setTimeout(() => {
        location.reload()
      }, settings.slickOptions.autoplaySpeed);
    }

    //init slick carousel
    $('#div-images').slick(settings.slickOptions);

    //refresh at end of carousel
    $('#div-images').on('afterChange', (event, slick, currentSlide) => {
      if (currentSlide == 0) {
        location.reload();
      }
    })
  } catch (err) {
    $('#modal-msg-heading').html("Error");
    $('#modal-msg-body').html(err);
    $('#modal-msg').modal('show');
    setTimeout(() => {
      location.reload()
    }, 5000);
  }
});