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
			zoom: 5,
			center: {lat: -30.559482, lng: 22.937505999999985}
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
					var pos = new google.maps.LatLng(this.location.latitude, this.location.longitude); 
					var marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        title: that.title,
                        url: that.url
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

    jQuery('.grid').masonry({
        // options
        itemSelector: '.grid-item',
        // use element for option
        columnWidth: 1,
        percentPosition: true
    });
	jQuery('.bxslider').bxSlider({
        mode: 'fade',
        auto: true,
        autoControls: true,
		touchEnabled: true,
        pause: 5000
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