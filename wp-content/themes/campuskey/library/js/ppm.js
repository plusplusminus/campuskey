jQuery.fn.highlight = function (str, className) {    
    var regex = new RegExp(str, "gi");

    return this.each(function () {
        this.innerHTML = this.innerHTML.replace(regex, function(matched) {return "<i class=\"" + className + "\">" + matched + "</i>";});
    });
};

jQuery(".no-touch #menu-main li a").highlight("yl","letterspace");
jQuery(".header-title span").highlight("pe","letterspace");
jQuery(".header-title span").highlight("ge","letterspace");
jQuery(".footer-logo span").highlight("student","wordspace");



// Featured gallery

jQuery(window).load(function() {
	var $container = jQuery('.featured_gallery');
    // init
    $container.packery({
      itemSelector: '.item',
      gutter: 10
    });

    var $container = jQuery('#container');
    // init
    $container.packery({
      itemSelector: '.grid-item',
      gutter: 0
    });

    var $blogcontainer = jQuery('#blog-container');
    // init
    $blogcontainer.packery({
      itemSelector: '.article_blog',
      gutter: 0
    });





});

jQuery(document).ready(function(){
	initMap();
    initHeader();
    addListeners();
})

function initHeader() {
    var height = window.innerHeight;
    
    largeHeader = document.getElementById('home_header');


    if (largeHeader) {
        var nav = document.getElementById('main-header').clientHeight;
        
        

        largeHeader.style.height = (height-nav+42)+'px';

    } 
}

function addListeners() {


    window.addEventListener('resize', resize);
}

function resize() {

    var height = window.innerHeight;
    
    largeHeader = document.getElementById('home_header');


    if (largeHeader) {
        var nav = document.getElementById('main-header').clientHeight;
        
        

        largeHeader.style.height = (height-nav+50)+'px';

    } 
}


function initMap() {

    map = document.getElementById('map');
    cmap = document.getElementById('campus-map');

	if (map) {


		map = new google.maps.Map(document.getElementById('map'), {
			zoom: 6,
			center: {lat: -29.559482, lng: 23.937505999999985},
            scrollwheel: false,
            styles:[{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"stylers":[{"hue":"#00aaff"},{"saturation":-100},{"gamma":2.15},{"lightness":12}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"lightness":24}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":57}]}]        
		});

		
		var type = jQuery('#map').data('type');
    	jQuery.ajax({
	        type : "post",
	        dataType : "json",
	        url : myAjax.ajaxurl,
	        data: {
	          action: "get_map_options",
	          type: type
	        },
	        error: function(err) {
	          console.log(err);
	        },
	        success: function(data) {
		        jQuery.each(data.data, function(){
		        	var that = this;
					//Plot the location as a marker
                    var image = {
                        url: that.icon,
                        // This marker is 20 pixels wide by 32 pixels tall.
                        size: new google.maps.Size(28, 40),
                        // The origin for this image is 0,0.
                        origin: new google.maps.Point(0,0),
                        // The anchor for this image is the base of the flagpole at 0,32.
                        anchor: new google.maps.Point(14, 40)
                    };
					var pos = new google.maps.LatLng(this.location.latitude, this.location.longitude); 
					var marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        title: that.title,
                        url: that.url,
                        icon: image
                    });
                    google.maps.event.addListener(marker, 'click', function() {
					    window.location.href = this.url;
					});
				});

	        }
	    });

    } else if (cmap) {

               
        var type = jQuery('#campus-map').data('type');
        var id = jQuery('#campus-map').data('id');

        jQuery.ajax({
            type : "post",
            dataType : "json",
            url : myAjax.ajaxurl,
            data: {
              action: "get_cmap_options",
              type: type,
              id: id
            },
            error: function(err) {
              console.log(err);
            },
            success: function(data) {

                console.log(data);
                var center = new google.maps.LatLng(data.base.location.latitude, data.base.location.longitude); 

                map = new google.maps.Map(cmap, {
                    zoom: 16,
                    center: center,
                    scrollwheel: false,
                    styles:[{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"stylers":[{"hue":"#00aaff"},{"saturation":-100},{"gamma":2.15},{"lightness":12}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"lightness":24}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":57}]}]        
                });

                bounds  = new google.maps.LatLngBounds();

                bounds.extend(center);

                jQuery.each(data.data, function(){
                    
                    if (this.location.latitude != "") {
                        var that = this;
                        //Plot the location as a marker
                        var image = {
                            url: that.icon,
                            // This marker is 20 pixels wide by 32 pixels tall.
                            size: new google.maps.Size(155, 40),
                            // The origin for this image is 0,0.
                            origin: new google.maps.Point(0,0),
                            // The anchor for this image is the base of the flagpole at 0,32.
                            anchor: new google.maps.Point(13,40)
                        };
                        var pos = new google.maps.LatLng(this.location.latitude, this.location.longitude); 
                        var marker = new google.maps.Marker({
                            position: pos,
                            map: map,
                            title: that.title,
                            url: that.url,
                            icon: image
                        });
                        google.maps.event.addListener(marker, 'click', function() {
                            window.location.href = this.url;
                        });

                        bounds.extend(pos);
                    }
                });

                map.fitBounds(bounds);  
                map.panToBounds(bounds);     

            }
        });

    }   

}

jQuery(document).ready(function() {

    

    

    jQuery('#accordion')
      .on('show.bs.collapse', function(e) {
        jQuery(e.target).prev('.list-group-item').addClass('active');
      })
      .on('hide.bs.collapse', function(e) {
        jQuery(e.target).prev('.list-group-item').removeClass('active');
    });


    jQuery(".header-nav > ul").children().each(function() {
        jQuery(this).clone().addClass("headerLi").appendTo(jQuery(".enumenu_ul"))
    });
    jQuery('.enumenu_ul').responsiveMenu({
        'mobileResulution': '767',
        'menuIcon_text': 'MENU <i class="demo-icon icon-menu2"></i>',
        onMenuopen: function() {}
    });
    
    jQuery(".campus-grid-main").hover(function() {
        jQuery(".campus-grid-main").removeClass("hover");
        jQuery(this).addClass("hover");
    }, function() {
        jQuery(this).removeClass("hover");
    });
    if ('ontouchstart' in window) {
        jQuery(".campus-grid-main").on('touchstart', function() {
            jQuery(".campus-grid-main").removeClass("hover")
            jQuery(this).addClass("hover");
        });
        jQuery(".campus-grid-main").on('blur', function() {
            jQuery(this).removeClass("hover");
            jQuery(".campus-grid-main").removeClass("hover");
        });
    }

    var owlCarouselThumb = jQuery(".owl-thumbs");
    var owlCarousel = jQuery(".owl-carousel");

    jQuery(".sliderThumb", owlCarouselThumb).each(function(index) {
        var newAccordianContentWrapper = jQuery("<div>", {
            class: "accordianContent"
        });
        newAccordianContentWrapper.append(jQuery(".sliderContent", owlCarousel).eq(index).clone());
        jQuery(this).append(newAccordianContentWrapper);
    });
    owlCarousel.owlCarousel({
        items: 1,
        nav: true,
		smartSpeed: 200,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        startPosition: jQuery(".sliderThumb.active", owlCarouselThumb).index(),
        onInitialize: function(event) {}
    });
    owlCarousel.on('translate.owl.carousel', function(event) {
        console.log(event);
        var item = event.item.index; // Position of the current item
        jQuery(".sliderThumb", owlCarouselThumb).removeClass("active");
        jQuery(".sliderThumb", owlCarouselThumb).eq(item).addClass("active");
    });
    if (owlCarousel.is(":visible")) {
        jQuery(".sliderThumb").find(".accordianContent").removeAttr("style");
        owlCarouselThumb.addClass("tabsView");
    } else {
        owlCarouselThumb.removeClass("tabsView");
        jQuery(".sliderThumb.active").find(".accordianContent").slideDown();
    }
    jQuery(window).resize(function() {
        if (owlCarousel.is(":visible")) {
            jQuery(".sliderThumb").find(".accordianContent").removeAttr("style");
            owlCarouselThumb.addClass("tabsView");
        } else {
            owlCarouselThumb.removeClass("tabsView");
            jQuery(".sliderThumb.active").find(".accordianContent").slideDown();

        }
    });
    jQuery(".sliderThumb > a", owlCarouselThumb).on("click", function() {
        var closestSliderThumb = jQuery(this).closest(".sliderThumb");
        if (!owlCarouselThumb.hasClass("tabsView")) {
            var this_ = jQuery(this);
            /*if (this_.closest(".sliderThumb").hasClass("active")) {
                this_.next(".accordianContent").slideUp()
            } else {*/
            jQuery(".sliderThumb .accordianContent").slideUp(function() {
                jQuery(this).closest(".sliderThumb").removeClass("active");
            });
            this_.next(".accordianContent").slideDown(function() {
                this_.closest(".sliderThumb").addClass("active");
            });
            //}
        }
        owlCarousel.trigger('to.owl.carousel', closestSliderThumb.index(), [300]);
    });
    jQuery(".slider-nav .owl-prev").click(function() {
        owlCarousel.trigger('prev.owl.carousel', [300]);
    });
    jQuery(".slider-nav .owl-next").click(function() {
        owlCarousel.trigger('next.owl.carousel');
    });
    jQuery('.scrollit').on('click',function(event){
        var jQueryanchor = jQuery(this);
        
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(jQueryanchor.attr('href')).offset().top-125
        }, 1500);
        
        event.preventDefault();
    });
});

jQuery(window).load(function() {
    jQuery(".slider-container .slider-text").addClass("animation");

	jQuery('.bxslider').bxSlider({
        mode: 'fade',
        auto: false,
        autoControls: true,
		touchEnabled: true,
        pause: 5000,
        nextText: '<span class="fa fa-angle-right"></span>',
        prevText: '<span class="fa fa-angle-left"></span>',
    });
});
jQuery(window).load(function() {
        // will first fade out the loading animation
	jQuery("#status").fadeOut();
        // will fade out the whole DIV that covers the website.
	jQuery("#preloader").delay(100).fadeOut("slow");

     var height = jQuery('.page-room').outerHeight();
    var width = jQuery('.page-room').width();

    jQuery('.border-room').css('border-left-width',width);
    jQuery('.border-room').css('border-bottom-width',height);

    var camp_height = jQuery('.choose-campus').outerHeight();
    var camp_width = jQuery('.choose-campus').width();

    jQuery('.border-campus').css('border-left-width',camp_width);
    jQuery('.border-campus').css('border-bottom-width',camp_height);

    var floor_height = jQuery('.page-floor').outerHeight();
    var floor_width = jQuery('.page-floor').width();

    jQuery('.border-floor').css('border-left-width',floor_width);
    jQuery('.border-floor').css('border-top-width',floor_height);

})

jQuery(window).resize(function() {
    
    var height = jQuery('.page-room').outerHeight();
    var width = jQuery('.page-room').width();

    jQuery('.border-room').css('border-left-width',width);
    jQuery('.border-room').css('border-bottom-width',height);

    var camp_height = jQuery('.choose-campus').outerHeight();
    var camp_width = jQuery('.choose-campus').width();

    jQuery('.border-campus').css('border-left-width',camp_width);
    jQuery('.border-campus').css('border-bottom-width',camp_height);
})



// Equal Height
equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 jQuery(container).each(function() {

   $el = jQuery(this);
   jQuery($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

jQuery(window).load(function() {
  equalheight('.documents .doc .document_holder');

  equalheight('.section_news .article_blog');


  jQuery('a').removeAttr( "title" );
  jQuery('img').removeAttr( "alt" );

});


jQuery(window).resize(function(){
  equalheight('.documents .doc .document_holder');

  equalheight('.section_news .article_blog');
});

jQuery(document).ready(function() {
    jQuery(".fancybox").fancybox();
});