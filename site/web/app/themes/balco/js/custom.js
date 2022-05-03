jQuery(document).ready(function(){
  var $document = $(document),
      $element = $('#header'),
      className = 'hasScrolled';

  $document.scroll(function() {
      if ($document.scrollTop() >= 150) {
          $element.addClass(className);
      } 
      else {
          $element.removeClass(className);
      }
  });
  jQuery(document).on('click', 'a[href^="#"]', function (event) {
      event.preventDefault();

      jQuery('html, body').animate({
          scrollTop: jQuery(jQuery.attr(this, 'href')).offset().top
      }, 500);
  });
  
  jQuery('.slide-images').slick({
      dots: true,
      arrows: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 6000,
      speed: 800,
      slidesToShow: 1
  });
    // check to see if there are one or less slides
    if (!(jQuery('.slide-images .slick-slide').length > 1)) {
        jQuery('.slide-images .slick-dots').hide();
    }
    var animation = 'rubberBand';
        
    jQuery('.menu-icon').on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      jQuery('.desktop-menu-holder').toggleClass('active-menu');
      jQuery('.desktop-menu').toggleClass('show-menu');
      jQuery(this).toggleClass('menu-icon--active');
    });
      
    jQuery('.menu-icon').on('click', function () {
      jQuery(this).addClass('animated ' + animation).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
      jQuery(this).removeClass('animated ' + animation);
      });
    });
       
    if (jQuery('#menu-main-menu li').hasClass('menu-item-has-children')) {    
      jQuery('.menu-item-has-children > a').prepend('<span class="click-li-child"><span>+</span>');
    }

    jQuery('.click-li-child').click(function(e){
      e.preventDefault();
      jQuery(this).toggleClass('flipX');
      jQuery(this).parent().next().slideToggle();
    })
     
});