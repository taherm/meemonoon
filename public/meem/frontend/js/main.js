(function ($) {
 "use strict";
	
/*----------------------------
 wow js active
------------------------------ */
 new WOW().init();

/*---------------------
     tooltip
--------------------- */
	
    $('[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'top',
        container: 'body'
    });
	
/*----------------------------
 jQuery MeanMenu
------------------------------ */
	jQuery('nav#dropdown').meanmenu();
	
/*------------------------------------
 search option
------------------------------------- */ 
	$('.search-option').hide();
	$(".search-img").on('click', function(){
	   $('.search-option').animate({
		height:'toggle',
	    });
	});
	
/*--------------------------
	Category Accordion
---------------------------- */	
	 $('.rx-parent').on('click', function(){
		$('.rx-child').slideToggle(300);
		$(this).toggleClass('rx-change');
	});
	
/*--------------------------
 collapse
---------------------------- */	
	$('.panel-heading a').on('click', function(){
		$('.panel-heading a').removeClass('active');
		$(this).addClass('active');
	});
	
/*------------------------------------
 nivoSlider active
------------------------------------- */  
	$('#topSlider').nivoSlider({
		effect: 'random',
		slices: 15,
		boxCols: 12,
		boxRows: 4,
		animSpeed: 600,
		pauseTime: 5000,
		startSlide: 0,
		controlNavThumbs: false,
		pauseOnHover: false,
		manualAdvance: false,
		prevText: '',
		nextText: '',
		
	});
	
/*----------------------------
 wow js active
------------------------------ */
 new WOW().init();
	
 
/*----------------------------
  Product Carousel
------------------------------ */  
  $(".product-carousel").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 4,
	  /* transitionStyle : "fade", */    /* [This code for animation ] */
	  navigationText:["<i class='fa fa-caret-left'></i>","<i class='fa fa-caret-right'></i>"],
      itemsDesktop : [1199,4],
	  itemsDesktopSmall : [980,3],
	  itemsTablet: [768,2],
	  itemsMobile : [500,1],
  });
	
	
/*----------------------------
  Product Carousel
------------------------------ */  
  $(".new-product-carousel").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 1,
	  /* transitionStyle : "fade", */    /* [This code for animation ] */
	  navigationText:["<i class='fa fa-caret-left'></i>","<i class='fa fa-caret-right'></i>"],
      itemsDesktop : [1199,1],
	  itemsDesktopSmall : [980,1],
	  itemsTablet: [768,1],
	  itemsMobile : [479,1],
  });
/*----------------------------
  single Product Carousel
------------------------------ */  
  $("#single-product").owlCarousel({
	  autoPlay: false,
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,
	  items : 3,
	  margin:30,
	  navigationText:["<i class='fa fa-caret-left'></i>","<i class='fa fa-caret-right'></i>"],
	  itemsDesktop : [1199,3],
	  itemsDesktopSmall : [980,2],
	  itemsTablet: [768,2],
	  itemsMobile : [479,1],
  });


///*----------------------------
// price-slider active
//------------------------------ */
//	  $( "#slider-range" ).slider({
//	   range: true,
//	   min: 0,
//	   max: 1000,
//	   values: [ 0, 1000 ],
//	   slide: function( event, ui ) {
//		$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
//	   }
//	  });
//	  $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
//	   " - $" + $( "#slider-range" ).slider( "values", 1 ));
	
/*--------------------------
     scrollUp
---------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
		
/*----------------------------
  Simple Lence Active
------------------------------ */  
	$('#p-view .simpleLens-lens-image').simpleLens({
	});
	
 
})(jQuery); 