(function ($)
  { "use strict"

   /* ======= Preloader ======= */
   $('.preloader').delay(500).fadeOut(500);
/* 1. sticky And Scroll UP */
    // $(window).on('scroll', function () {
    //   var scroll = $(window).scrollTop();
    //   if (scroll < 400) {
    //     $(".header-sticky").removeClass("sticky-bar");
    //     $('#back-top').fadeOut(500);
    //   } else {
    //     $(".header-sticky").addClass("sticky-bar");
    //     $('#back-top').fadeIn(500);
    //   }
    // });

  // Scroll Up
    $('#back-top a').on("click", function () {
      $('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });


/* 2. slick Nav */
// mobile_menu
    var menu = $('ul#navigation');
    if(menu.length){
      menu.slicknav({
        prependTo: ".mobile_menu",
        closedSymbol: '+',
        openedSymbol:'-'
      });
    };


/* 3. MainSlider-1 */
    // h1-hero-active
    function mainSlider() {
      var BasicSlider = $('.slider-active');
      BasicSlider.on('init', function (e, slick) {
        var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
        doAnimations($firstAnimatingElements);
      });
      BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
        var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
        doAnimations($animatingElements);
      });
      BasicSlider.slick({
        autoplay: true,
        autoplaySpeed: 8000,
        dots: true,
        fade: true,
        arrows: false,
        prevArrow: '<button type="button" class="slick-prev"><i class="ti-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="ti-angle-right"></i></button>',
        responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false,
              dots:false
            }
          }
        ]
      });

      function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function () {
          var $this = $(this);
          var $animationDelay = $this.data('delay');
          var $animationType = 'animated ' + $this.data('animation');
          $this.css({
            'animation-delay': $animationDelay,
            '-webkit-animation-delay': $animationDelay
          });
          $this.addClass($animationType).one(animationEndEvents, function () {
            $this.removeClass($animationType);
          });
        });
      }
    }
    mainSlider();


// 4. Single Img slder
    $('.services1-active').slick({
      dots: false,
      infinite: true,
      autoplay: true,
      speed: 400,
      arrows: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: false,
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: false,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false
          }
        },
      ]
    });

/* 5. Testimonial Active*/
  var testimonial = $('.h1-testimonial-active');
  if(testimonial.length){
  testimonial.slick({
      dots: false,
      infinite: true,
      speed: 1000,
      autoplay:true,
      loop:true,
      arrows: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="ti-angle-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="ti-angle-right"></i></button>',
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: false,
            arrow:false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows:false
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows:false,
          }
        }
      ]
    });
  }


/* 6. Nice Selectorp  */
  var nice_Select = $('select');
    if(nice_Select.length){
      nice_Select.niceSelect();
    }

/* 7. data-background */
    $("[data-background]").each(function () {
      $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
      });

/* 10. WOW active */
    new WOW().init();

// 11. ---- Mailchimp js --------//
    function mailChimp() {
      $('#mc_embed_signup').find('form').ajaxChimp();
    }
    mailChimp();


// 12 Pop Up Img
    var popUp = $('.single_gallery_part, .img-pop-up');
      if(popUp.length){
        popUp.magnificPopup({
          type: 'image',
          gallery:{
            enabled:true
          }
        });
      }

// 12 Pop Up Video
    var popUp = $('.popup-video');
    if(popUp.length){
      popUp.magnificPopup({
        type: 'iframe'
      });
    }

/* 13. counterUp*/
    $('.counter').counterUp({
      delay: 10,
      time: 3000
    });

//14.  Progress barfiller

    $('#bar1').barfiller();
    $('#bar2').barfiller();
    $('#bar3').barfiller();
    $('#bar4').barfiller();
    $('#bar5').barfiller();
    $('#bar6').barfiller();




})(jQuery);

/* home page fast donation pop up */
$('.alert-message').hide();
$('.success-message').hide();
$(document).ready(function() {
  $('#next_step').on('click' , function (e) {
      $('.alert-message').hide();
      $('.success-message').hide();
      $('#step_one').addClass('hide');
      $('#step_two').removeClass('hide');
  });
});
$(document).ready(function() {
  $('#button_return').on('click' , function (e) {
      $('#step_two').addClass('hide');
      $('#step_one').removeClass('hide');
  });
});

$(document).ready(function() {
	$('.show_pop_up').on('click' , function (e) {
        var id = $(this).attr("data-id-popup");
        var value = $('input[name='+ 'price'+ id +']:checked').val();
        value = value ? value : $('.price'+id).val();
        var stock_id = $('input[name='+ 'price'+ id +']:checked').attr('id');
        stock_id = stock_id ? stock_id : $('.price'+id).attr('id');
        $('.quick_card_title').html($(this).attr("data-title-popup"))
        $('.price_stock').text((value ? value : 0) + " ????????");
        $('.cards_div').html("");
        $('.mini-loading').show();
        $('#id-cart').val(id);
        $('#name-cart').val($(this).attr("data-title-popup"));
        $('#image-cart').val($(this).attr("data-image-popup"));
        $('#stock-cart').val(stock_id);


		let _token   = $('input[name="_token"]').val();
		$.ajax({
			url: "/project-cards",
			type:"POST",
			data:{
			  id:id,
			  _token: _token
			},
        success:function(response){
            $('.mini-loading').hide();
            $('.cards_div').html("");
            response.forEach(element => {
                $('.cards_div').append('<div class="col-md-6">\
                <div class="input-container">\
                    <input id="'+ element.id +'" value="'+ element.id +'" class="radio-button" type="radio" name="price">\
                        <div class="radio-tile radio-tile2">\
                            <img src="'+ element.image +'" class="image_card">\
                        </div>\
                </div>\
                </div>');
            });
			},
		});
	});
});

// add to cart

$(document).ready(function() {
  $('.submit-cart').on('click', function(e)
  {
    var $form = $(this).closest("form");
    $form.submit();
  });
});

$(document).ready(function() {
	$('#add-to-cart').on('submit' , function (e) {

    e.preventDefault();

    $.ajax({
			url: "/add-cart",
			type:"POST",
			data:{
			  id:$('#id-cart').val(),
			  name:$('#name-cart').val(),
        stock_id:$('#stock-cart').val(),
        card_id : $('input[name="price"]:checked').attr('id'),
			  image:$('#image-cart').val(),
        giver_name : $('#giver-name').val() ,
        giver_email : $('#giver-email').val(),
        giver_number : $('#giver-number').val(),
        receiver_name :$('#receiver-name').val() ,
        receiver_email : $('#receiver-email').val(),
        receiver_number : $('#receiver-number').val(),
			  _token: $('input[name="_token"]').val()
			},
	  success:function(response){
        $('.badge_shopping').html(response.count);
        $('.alert-message').hide();
        $('.success-message').html(response.success_message);
        $('.success-message').show();
        console.log(response);
      },
      error:function(response)
      {
        $('.alert-message').show();
        $('.alert-message').html("");
        console.log(response.responseJSON.errors);
        for (key in response.responseJSON.errors)
        {
          $('.alert-message').append(
            "<div>" +
              response.responseJSON.errors[key] +
            "</div>"
          );
        }
        if (!('card_id' in response.responseJSON.errors))
        {
            $('#button_return').trigger("click");
        }
      }
    });
  });
});
