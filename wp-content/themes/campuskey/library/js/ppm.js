jQuery(window).load(function() {
	var $container = jQuery('.featured_gallery');
    // init
    $container.packery({
      itemSelector: '.item',
      gutter: 10
    });




});

jQuery(document).ready(function(){
	initMap();
})


function initMap() {

    map = document.getElementById('map');

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
                        size: new google.maps.Size(120, 35),
                        // The origin for this image is 0,0.
                        origin: new google.maps.Point(0,0),
                        // The anchor for this image is the base of the flagpole at 0,32.
                        anchor: new google.maps.Point(21, 35)
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

    } else {
        console.log("no map");
    }
}

jQuery(document).ready(function() {

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
		smartSpeed: 700,
        startPosition: jQuery(".sliderThumb.active", owlCarouselThumb).index(),
        onInitialize: function(event) {}
    });
    owlCarousel.on('translated.owl.carousel', function(event) {
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
});

jQuery(window).load(function() {
    jQuery(".slider-container .slider-text").addClass("animation");

	jQuery('.bxslider').bxSlider({
        mode: 'fade',
        auto: true,
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

function init() {
    window.addEventListener('scroll', function(e) {
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 200,
            header = document.querySelector("header");
        if (distanceY > shrinkOn) {
            classie.add(header, "smaller");
        } else {
            if (classie.has(header, "smaller")) {
                classie.remove(header, "smaller");
            }
        }
    });


}
window.onload = init();