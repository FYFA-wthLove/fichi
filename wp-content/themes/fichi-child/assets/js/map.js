(function( $ ) {
    function initMap( $el ) {
        var $markers = $el.find('.marker');
        var mapArgs = {
            zoom        : $el.data('zoom') || 16,
            mapTypeId   : google.maps.MapTypeId.ROADMAP,
            styles: [
                {
                    "featureType": "all",
                    "stylers": [
                        {
                            "saturation": 0
                        },
                        {
                            "hue": "#e7ecf0"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "stylers": [
                        {
                            "saturation": -70
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        },
                        {
                            "saturation": -60
                        }
                    ]
                }
            ]
        };
        var map = new google.maps.Map( $el[0], mapArgs );
        map.markers = [];
        $markers.each(function(){
            initMarker( $(this), map );
        });

        centerMap( map );

        return map;
    }

    function initMarker( $marker, map ) {

        var lat = $marker.data('lat');
        var lng = $marker.data('lng');
        var latLng = {
            lat: parseFloat( lat ),
            lng: parseFloat( lng )
        };

        var marker_icon = object_marker.templateMarker;
        var marker = new google.maps.Marker({
            position : latLng,
            map: map,
            icon: marker_icon
        });

        map.markers.push( marker );

        if( $marker.html() ){

            var infowindow = new google.maps.InfoWindow({
                content: $marker.html()
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open( map, marker );
            });
        }
    }

    function centerMap( map ) {

        // Create map boundaries from all map markers.
        var bounds = new google.maps.LatLngBounds();
        map.markers.forEach(function( marker ){
            bounds.extend({
                lat: marker.position.lat(),
                lng: marker.position.lng()
            });
        });

        if( map.markers.length == 1 ){
            map.setCenter( bounds.getCenter() );
        } else{
            map.fitBounds( bounds );
        }
    }

    $(document).ready(function(){
        $('.acf-map').each(function(){
            var map = initMap( $(this) );
        });
    });

})(jQuery);