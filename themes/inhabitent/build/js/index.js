
(function ($) {
    $('button.search-submit').on('click', function(event) {
      event.preventDefault();
      event.stopPropagation();
      $('.search-field').toggle('slow');
    });

    $(document).on('click', function(event) {
    if(! $('.search-field').is(event.target) ) {
      $('.search-field').hide('slow');
    }
  });

    $(window).on('scroll', function() {
      var scrollPosition = $(window).scrollTop();
      var heroHeight = $('.hero-banner').height();
      if(scrollPosition > heroHeight) {
        $('#masthead').addClass('active');
      } else {
        $('#masthead').removeClass('active');
      }

    })
})(jQuery);

