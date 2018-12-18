var map;
var temp_marker = [];
var markers = [];
var idLat,idLong;

if ( typeof google != 'undefined' ) {
    var MyLatLng = new google.maps.LatLng(-6.296225924299342, 106.709375);
    var CurrentLatLng = MyLatLng;
}
$(document).ready(function() {
	if ( typeof MyLatLng != 'undefined' ) {
        var mapProp = {
            center:MyLatLng,
            zoom:11,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        map=new google.maps.Map(document.getElementById("map_area"),mapProp);
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    //console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                /* Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));*/

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
    $('#formAddMarker').modal({
        show: false
    });
    $('#formAddMarker').on('shown.bs.modal', function (e) {
        google.maps.event.trigger(map,'resize',{});
        map.setCenter(CurrentLatLng);
    });
});
function open_map(id_lat,id_long) {
    //console.log(id_lat)
    idLat = !id_lat ? '#koordinat_latitude' : id_lat;
    idLong = !id_long ? '#koordinat_longitude' : id_long;

    if ( typeof MyLatLng != 'undefined' ) {
        reset_markers(temp_marker);
        CurrentLatLng = MyLatLng;
        $('#exampleModalLabel').html('Klik Pada Peta Untuk Menentukan Lokasi');
        $('#formAddMarker').modal('show');
        map.setCenter(MyLatLng);
        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng);
        });
    }
}
function view_map(lat, lng) {
    if ( typeof MyLatLng != 'undefined' && lat != '' && lng != '' ) {
        reset_markers(temp_marker);
        var location = new google.maps.LatLng(lat, lng);
        CurrentLatLng = location;
        $('#exampleModalLabel').html('View Lokasi Pada Peta');
        $('#formAddMarker').modal('show');
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: base_url + 'asset/images/aset-icon/' + icon_marker
        });
        temp_marker.push(marker);
        map.setZoom(11);
    } else {
        alert('Koordinat Latitude dan Longitude tidak tersedia.');
    }
}
function reset_markers(item_marker) {
    for ( var i=0; i<item_marker.length; i++ ) {
        item_marker[i].setMap(null);
    }
}
function placeMarker(location) {
    //console.log(idLat)
    if ( typeof MyLatLng != 'undefined' ) {
        reset_markers(markers);
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: base_url + 'asset/images/aset-icon/' + icon_marker
        });
        temp_marker.push(marker);
        $(idLat).val(marker.getPosition().lat());
        $(idLong).val(marker.getPosition().lng());
        $('#formAddMarker').modal('hide');
    }
}