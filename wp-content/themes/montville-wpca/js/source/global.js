;(function($){
	/*
	*  new_map
	*
	*  This function will render a Google Map onto the selected jQuery element
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$el (jQuery element)
	*  @return	n/a
	*/

	function new_map( $el ) {

		// var
		// var $markers = $el.find('.marker');


		// vars
		var args = {
			zoom				: 16,
			center				: new google.maps.LatLng(0, 0),
			mapTypeId			: google.maps.MapTypeId.ROADMAP,
			zoomControl			: false,
			mapTypeControl		: false,
			scaleControl		: false,
			streetViewControl	: false,
			rotateControl		: false,
			fullscreenControl	: false
		};


		// create map
		var map = new google.maps.Map( $el[0], args);
		var input = document.querySelector('.google-map-container .search input');
		var searchBox = new google.maps.places.SearchBox(input);
		// map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
		map.addListener('bounds_changed', function() {
			searchBox.setBounds(map.getBounds());
		});

		// add a markers reference
		map.markers = [];
		Array.prototype.forEach.call(php_vars.markers, function(markerElem){
			// console.log(markerElem);
			markerElem.point = new google.maps.LatLng(markerElem.lat, markerElem.lng);
			map.markers.push(new google.maps.Marker({
				map: map,
				position: markerElem.point,
				icon: markerElem.iconFile,
				label: markerElem.label
			}));
		});

		// add markers
		// console.log($markers);
		// $markers.each(function(){
		// 	add_marker( $(this), map );
		// });


		searchBox.addListener('places_changed', function() {
			var places = searchBox.getPlaces();

			if (places.length == 0) {
				return;
			}

			// For each place, get the icon, name and location.
			var bounds = new google.maps.LatLngBounds();
			places.forEach(function(place) {
				if (!place.geometry) {
					console.log("Returned place contains no geometry");
					return;
				}

				if (place.geometry.viewport) {
					// Only geocodes have viewport.
					bounds.union(place.geometry.viewport);
				} else {
					bounds.extend(place.geometry.location);
				}
			});
			map.fitBounds(bounds);
		});

		// center map
		center_map( map );


		// return
		return map;

	}

	/*
	*  add_marker
	*
	*  This function will add a marker to the selected Google Map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	$marker (jQuery element)
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

	function add_marker( $marker, map ) {

		// var
		var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

		// create marker
		var marker = new google.maps.Marker({
			position	: latlng,
			map			: map
		});

		// add to array
		map.markers.push( marker );

		// if marker contains HTML, add it to an infoWindow
		if( $marker.html() )
		{
			// create info window
			var infowindow = new google.maps.InfoWindow({
				content		: $marker.html()
			});

			// show info window when marker is clicked
			google.maps.event.addListener(marker, 'click', function() {

				infowindow.open( map, marker );

			});
		}

	}

	/*
	*  center_map
	*
	*  This function will center the map, showing all markers attached to this map
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	4.3.0
	*
	*  @param	map (Google Map object)
	*  @return	n/a
	*/

	function center_map( map ) {

		// vars
		var bounds = new google.maps.LatLngBounds();

		// loop through all markers and create bounds
		$.each( map.markers, function( i, marker ){

			var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

			bounds.extend( latlng );

		});

		// only 1 marker?
		if( map.markers.length == 1 )
		{
			// set center of map
		    map.setCenter( bounds.getCenter() );
		    map.setZoom( 15 );
		}
		else
		{
			// fit to bounds
			map.fitBounds( bounds );
		}

	}

	/*
	*  document ready
	*
	*  This function will render each map when the document is ready (page has loaded)
	*
	*  @type	function
	*  @date	8/11/2013
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	// global var
	var map = null;

	// Scripts which runs after DOM load
	$(document).ready(function(){
		$('.google-map-container .search').on('focus', 'input', function(){
			$('.google-map-container .search').addClass('focused');//.find('.placeholder').hide();
		}).on('focusout', 'input', function(){
			if(!$(this).val()){
				$('.google-map-container .search').removeClass('focused');//.find('.placeholder').show();
			}
		});
		// $('.video-button').on('click', function(){
		// 	$(this).toggleClass('playing');
		// });
		$('.acf-map').each(function(){

			// create map
			map = new_map( $(this) );

		});
		$('.google-map-container').on('click', '.filter:not(.active)', function(){
			$(this).addClass('active').siblings('.filter').removeClass('active');
			map.markers.forEach(function(marker){
				marker.setMap(null);
			});
			map.markers = [];
			if(php_vars.markers.length){
				var filterID = $(this).data('id');
				Array.prototype.forEach.call(php_vars.markers, function(markerElem){
					if($.inArray(filterID, markerElem.categories)){
						map.markers.push(new google.maps.Marker({
							map: map,
							position: markerElem.point,
							icon: markerElem.iconFile,
							label: markerElem.label
						}));
					}
				});
			}
		});
		$('.slick-slider .content').matchHeight();
		$('.custom-footer-widget-area').matchHeight();
		$('.menu-primary > .menu-item > a').matchHeight();

		$('.main-menu-button').on('click', function(e){
			e.preventDefault();
			$('.site-header').toggleClass('expanded');
			$('#genesis-mobile-nav-primary').trigger('click');
		});
	});

	// Scripts which runs after all elements load
	$(window).on('load', function(){
		vw = $( window ).width();
	});
	$(window).on('resize', function(){
		// $('.site-header').removeClass('expanded');
	});

}(jQuery));

var activePlayers = new Array();
if(!players) var players = new Array();
function onYouTubePlayerAPIReady(){
	players.forEach(function(element, index){
		activePlayers[index] = new YT.Player(element.id, element.settings);
	});
}