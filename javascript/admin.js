$(window).on('resize', function() {
    var containerWidth = $('.user-container').width();
    $('.user').css('min-width', containerWidth);
  });