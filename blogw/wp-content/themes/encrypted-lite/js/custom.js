(function($) {




    $.fn.parallax = function(options) {




        var windowHeight = $(window).height();




        // Establish default settings
        var settings = $.extend({
            speed        : 0.15
        }, options);




        // Iterate over each object in collection
        return this.each( function() {




        // Save a reference to the element
        var $this = $(this);




        // Set up Scroll Handler
        $(document).scroll(function(){




    var scrollTop = $(window).scrollTop();
            var offset = $this.offset().top;
            var height = $this.outerHeight();




    // Check if above or below viewport
if (offset + height <= scrollTop || offset >= scrollTop + windowHeight) {
return;
}




var yBgPosition = Math.round((offset - scrollTop) * settings.speed);




                // Apply the Y Background Position to Set the Parallax Effect
    $this.css('background-position', 'center ' + yBgPosition + 'px');
                
        });
        });
    }
}(jQuery));

jQuery(document).ready(function($){


    
  $('.client_logo .owl-carousel').owlCarousel({
    items:6,
      loop:false,
      margin:4,
      nav:true,
      navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      dots:false,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:6
          },
          1000:{
              items:6
          }
      }
  }) 


	$('.nav-menu').superfish()
	$('.search-icon .search-click').click(function() {
        $('.search-box').addClass('active');
    });

    $('.search-box .close').click(function() {
        $('.search-box').removeClass('active');
    });
    
  $('.owl-carousel').owlCarousel({
    items:3,
      loop:false,
      margin:10,
      nav:false,
      dots:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:3
          }
      }
  })
    
     $('.ticker-wrap-slide').bxSlider({
        auto:true,
        pager:false,
        controls:false
              
    });

    jQuery('.skillbar').each(function(){
		jQuery(this).find('.skillbar-bar').animate({
			width:jQuery(this).attr('data-percent')
		},6000);
	});
    
           
    $('.dl-menu li ul').addClass('dl-submenu');
   $( '#dl-menu' ).dlmenu();
    
   $('#el-top').fadeOut();
    $(window).scroll(function(){
    if($(this).scrollTop() > 300){
      $('#el-top').fadeIn();
    }else{
      $('#el-top').fadeOut();
    }
  }); 
   $("#el-top").click(function(){
  $('html,body').animate({scrollTop:0},600);
  });
  $('.error404 .number404').addClass('animated');
  $('#el-top').addClass('animated');
  
  $('.pointer').addClass('animated pulse');
  
  $('.testimonial').parallax({
speed : 0.30
});

  $('body').parallax({
speed : 0.50
});

if($(".nav-menu ul li").hasClass('page_item_has_children')){
    $(".nav-menu ul li.page_item_has_children").addClass('menu-item-has-children');
}
$('.per-row-4:nth-of-type(4)').after('<div class="clearfix"></div>')
    
     new WOW().init();
});



