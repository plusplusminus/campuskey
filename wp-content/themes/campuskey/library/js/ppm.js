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