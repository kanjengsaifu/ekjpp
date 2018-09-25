
var active_idx;
function open_map(idx) {
    active_idx = idx;
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
    if ( typeof MyLatLng != 'undefined' ) {
        reset_markers(markers);
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: base_url + 'asset/images/aset-icon/' + icon_marker
        });
        temp_marker.push(marker);
        $('#latitude_pembanding_'+active_idx).val(marker.getPosition().lat());
        $('#longitude_pembanding_'+active_idx).val(marker.getPosition().lng());
        $.ajax({
                type        : "POST",
                url         : base_url + "AjaxPekerjaan/update_lokasi_pembanding_by_map/",
                data        : {
                    id_lokasi   : $('#id_lokasi').val(),
                    latitude        : $('#latitude_pembanding_'+active_idx).val(),
                    longitude       : $('#longitude_pembanding_'+active_idx).val(),
                    keterangan  : active_idx
                },
                success     : function (data) {
                    if ($(this).attr("data-keterangan")){
                        calculate_total_luas_tanah_data_legalitas();
                    }
                },
            });
        $('#formAddMarker').modal('hide');
    }
}

var map;
var temp_marker = [];
var markers = [];
if ( typeof google != 'undefined' ) {
    var MyLatLng = new google.maps.LatLng(-6.296225924299342, 106.709375);
    var CurrentLatLng = MyLatLng;
}

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

    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];

        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) {
                return;
            }
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            if (place.geometry.viewport) {
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
}

var active_idx;
function open_map(idx) {
    active_idx = idx;
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
    if ( typeof MyLatLng != 'undefined' ) {
        reset_markers(markers);
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: base_url + 'asset/images/aset-icon/' + icon_marker
        });
        temp_marker.push(marker);
        $('#latitude_pembanding_'+active_idx).val(marker.getPosition().lat()).updateTextbox();
        $('#longitude_pembanding_'+active_idx).val(marker.getPosition().lng()).updateTextbox();
        $.ajax({
                type        : "POST",
                url         : base_url + "AjaxPekerjaan/update_lokasi_pembanding_by_map/",
                data        : {
                    id_lokasi   : $('#id_lokasi').val(),
                    latitude        : $('#latitude_pembanding_'+active_idx).val(),
                    longitude       : $('#longitude_pembanding_'+active_idx).val(),
                    keterangan  : active_idx
                },
                success     : function (data) {
                    if ($(this).attr("data-keterangan")){
                        calculate_total_luas_tanah_data_legalitas();
                    }
                },
            });
        $('#formAddMarker').modal('hide');
    }
}