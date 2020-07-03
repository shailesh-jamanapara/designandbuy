$(document).ready(function() {
    // cool nav menu
    $(window).on('load resize', function() {
      var $thisnav = $('.current-menu-item').offset().left;
  
      $('#line_effect li').hover(function() {
        var $left = $(this).offset().left - $thisnav;
        var $width = $(this).outerWidth();
        var $start = 0;
        $('.linebar').css({ 'left': $left , 'width': $width });
      }, function() {
        var $initwidth = $('.current-menu-item').width();
        $('.linebar').css({ 'left': '0' , 'width': $initwidth });
      });
    });
  
  });