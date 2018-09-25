var map;
var temp_marker = [];
var markers = [];
if ( typeof google != 'undefined' ) {
    var MyLatLng = new google.maps.LatLng(-2.324692889647872, 116.43085760498047);
    var CurrentLatLng = MyLatLng;
}
$(document).ready(function() {
    $('.cmb_select2').select2({
        theme: 'bootstrap',
        width: '100%'
    });
    $('#provinsi').change(function() {
        set_loader_select2('kota');
        reset_select2('kecamatan','Pilih Kecamatan');
        reset_select2('desa','Pilih Kelurahan/Desa');
        $.ajax({
            type: "GET",
            url: base_url + "ajax/get_data_kota?provinsi="+$(this).val(),
            success: function(msg) {
                var data = JSON.parse(msg);
                var result = data.result;
                set_option_select2('kota', result, 'Pilih Kabupaten/Kota', 'id', 'nama');
            },
            error: function(xhr, msg, e) {
                console.log(xhr.responseText);
            }
        });
    });
    $('#kota').change(function() {
        set_loader_select2('kecamatan');
        reset_select2('desa','Pilih Kelurahan/Desa');
        $.ajax({
            type: "GET",
            url: base_url + "ajax/get_data_kecamatan?kota="+$(this).val(),
            success: function(msg) {
                var data = JSON.parse(msg);
                var result = data.result;
                set_option_select2('kecamatan', result, 'Pilih Kecamatan', 'id', 'nama');
            },
            error: function(xhr, msg, e) {
                console.log(xhr.responseText);
            }
        });
    });
    $('#kecamatan').change(function() {
        set_loader_select2('desa');
        $.ajax({
            type: "GET",
            url: base_url + "ajax/get_data_desa?kecamatan="+$(this).val(),
            success: function(msg) {
                var data = JSON.parse(msg);
                var result = data.result;
                set_option_select2('desa', result, 'Pilih Kelurahan/Desa', 'id', 'nama');
            },
            error: function(xhr, msg, e) {
                console.log(xhr.responseText);
            }
        });
    });
    $('#tanggal_pekerjaan').daterangepicker({timePicker: false});
    if ( typeof MyLatLng != 'undefined' ) {
        var mapProp = {
            mapTypeId:google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            center:MyLatLng,
            zoom:5,
        };
        map=new google.maps.Map(document.getElementById("map_area"),mapProp);
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        markers = [];
        //console.log(list_point);
        var pointer = JSON.parse(list_point);
        for ( var i=0; i<pointer.length; i++ ) {
            var LatLngPoint = new google.maps.LatLng(parseFloat(pointer[i].latitude), parseFloat(pointer[i].longitude));
            var info = {is_pembanding:0, id:pointer[i].id, pembanding_ke: 0, jenis_objek: pointer[i].id_jenis_objek};
            var marker = new google.maps.Marker({
                map: map,
                icon: base_url + "asset/images/aset-icon/" + pointer[i].data_objek.icon,
                position: LatLngPoint
            });
            markers.push(marker);
            var content = show_infowindow(pointer[i].data_objek, pointer[i].link_detil);
                var info = new SnazzyInfoWindow({
                    marker: marker,
                    content: content,
                    closeOnMapClick: false
                });

            var data_banding = pointer[i].data_pembanding;
            for (   var b=0; b<data_banding.length; b++ ) {
                var LatLngPoint_banding = new google.maps.LatLng(parseFloat(data_banding[b].latitude), parseFloat(data_banding[b].longitude));
                var info = {is_pembanding:1, id:pointer[i].id, pembanding_ke: b, jenis_objek: pointer[i].id_jenis_objek};
                var marker = new google.maps.Marker({
                    map: map,
                    icon: base_url + "asset/images/aset-icon/" + data_banding[b].icon,
                    position: LatLngPoint_banding
                });
                markers.push(marker);

                var content = show_infowindow(data_banding[b], pointer[i].link_detil);
                var info = new SnazzyInfoWindow({
                    marker: marker,
                    content: content,
                    closeOnMapClick: false
                });
            }

        }
        if ( markers.length > 0 ) { 
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0; i < markers.length; i++) {
             bounds.extend(markers[i].getPosition());
            }

            map.fitBounds(bounds);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });
        }

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
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
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };


                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
        $('#pac-button').click(function() {
            var bounds = map.getBounds();
            var ne = bounds.getNorthEast(); 
            var sw = bounds.getSouthWest();
            var x1 = sw.lng();
            var x2 = ne.lng();
            var y1 = sw.lat();
            var y2 = ne.lat();
            reset_markers(markers);
            $.ajax({
                type: "GET",
                url: base_url + "peta/get_data_lokasi?x1="+x1+"&y1="+y1+"&x2="+x2+"&y2="+y2,
                success: function(msg) {
                    var data = JSON.parse(msg);
                    var pointer = data;
                    console.log(data);
                    for ( var i=0; i<pointer.length; i++ ) {
                        var LatLngPoint = new google.maps.LatLng(parseFloat(pointer[i].latitude), parseFloat(pointer[i].longitude));
                        var info = {is_pembanding:0, id:pointer[i].id, pembanding_ke: 0, jenis_objek: pointer[i].id_jenis_objek};
                        var marker = new google.maps.Marker({
                            map: map,
                            icon: base_url + "asset/images/aset-icon/" + pointer[i].data_objek.icon,
                            position: LatLngPoint
                        });
                        markers.push(marker);
                        var content = show_infowindow(pointer[i].data_objek, pointer[i].link_detil);
                            var info = new SnazzyInfoWindow({
                                marker: marker,
                                content: content,
                                closeOnMapClick: false
                            });

                        var data_banding = pointer[i].data_pembanding;
                        for (   var b=0; b<data_banding.length; b++ ) {
                            var LatLngPoint_banding = new google.maps.LatLng(parseFloat(data_banding[b].latitude), parseFloat(data_banding[b].longitude));
                            var info = {is_pembanding:1, id:pointer[i].id, pembanding_ke: b, jenis_objek: pointer[i].id_jenis_objek};
                            var marker = new google.maps.Marker({
                                map: map,
                                icon: base_url + "asset/images/aset-icon/" + data_banding[b].icon,
                                position: LatLngPoint_banding
                            });
                            markers.push(marker);

                            var content = show_infowindow(data_banding[b], pointer[i].link_detil);
                            var info = new SnazzyInfoWindow({
                                marker: marker,
                                content: content,
                                closeOnMapClick: false
                            });
                        }
                    }

                    var bounds = new google.maps.LatLngBounds();
                    for (var i = 0; i < markers.length; i++) {
                     bounds.extend(markers[i].getPosition());
                    }

                    map.fitBounds(bounds);

                    // Bias the SearchBox results towards current map's viewport.
                    map.addListener('bounds_changed', function() {
                        searchBox.setBounds(map.getBounds());
                    });
                },
                error: function(xhr, msg, e) {
                    console.log(xhr.responseText);
                }
            });
        });
    }
    $( "#bangunan-range" ).slider({
      range: true,
      min: 0,
      max: 7000,
      step: 50,
      values: [0,7000],
      slide: function( event, ui ) {
        $('#luas_bangunan_min').val(ui.values[ 0 ]);
        var string_bangunan_max = ui.values[ 1 ];
        if ( ui.values[ 1 ] == 7000 ) {
            string_bangunan_max = string_bangunan_max + '+';
        }
        $('#txt_luas_banngunan').html(ui.values[ 0 ] + ' - ' + string_bangunan_max);
        $('#luas_bangunan_max').val(ui.values[ 1 ]);
      }
    });

    $( "#luas_bangunan_min" ).val( $( "#bangunan-range" ).slider( "values", 0 ));
    $( "#luas_bangunan_max" ).val( $( "#bangunan-range" ).slider( "values", 1 ));

    $( "#tanah-range" ).slider({
      range: true,
      min: 0,
      max: 7000,
      step: 50,
      values: [0,7000],
      slide: function( event, ui ) {
        $('#luas_tanah_min').val(ui.values[ 0 ]);
        var string_tanah_max = ui.values[ 1 ];
        if ( ui.values[ 1 ] == 7000 ) {
            string_tanah_max = string_tanah_max + '+';
        }
        $('#txt_luas_tanah').html(ui.values[ 0 ] + ' - ' + string_tanah_max);
        $('#luas_tanah_max').val(ui.values[ 1 ]);
      }
    });

    $( "#luas_tanah_min" ).val( $( "#tanah-range" ).slider( "values", 0 ));
    $( "#luas_tanah_max" ).val( $( "#tanah-range" ).slider( "values", 1 ));

    $( "#harga-range" ).slider({
      range: true,
      min: 0,
      max: 20000000000,
      step: 100000000,
      values: [0,20000000000],
      slide: function( event, ui ) {
        $('#harga_min').val(ui.values[ 0 ]);
        $('#harga_max').val(ui.values[ 1 ]);
        var string_harga = '';

        var value_min  = ui.values[ 0 ];
        var string_min = (value_min/1000000) + 'Jt';
        var strlen_min = String(value_min).length;
        if ( strlen_min >= 10 && strlen_min <= 12 ) {
            string_min = (value_min/1000000000)+'M';
        } else if ( strlen_min >= 13 && strlen_min <= 15 ) {
            string_min = (value_min/1000000000000)+'T';
        }

        var value_max  = ui.values[ 1 ];
        var string_max = (value_max/1000000) + 'Jt';
        var strlen_max = String(value_max).length;
        if ( strlen_max >= 10 && strlen_max <= 12 ) {
            string_max = (value_max/1000000000)+'M';
        } else if ( strlen_max >= 13 && strlen_max <= 15 ) {
            string_max = (value_max/1000000000000)+'T';
        }
        if ( string_max == '20M')
            string_max = string_max+'+';
        string_harga = string_min + ' - ' + string_max;
        $('#txt_harga').html(string_harga);
      }
    });

    $( "#harga_min" ).val( $( "#harga-range" ).slider( "values", 0 ));
    $( "#harga_max" ).val( $( "#harga-range" ).slider( "values", 1 ));
});
function show_infowindow(infodata, link) {
            if ( infodata.foto_1 != '' && infodata.foto_1 != null && infodata.foto_1 != 'null') {
                var image = base_url+'asset/file/'+infodata.foto_1;
            } else{
                var image = base_url+'asset/images/no_available_image.gif';
            }
            var content = '<table style="width: 285px">' +
                        '<tbody>' +
                        '<tr><td rowspan="3" style="width: 85px"><img src="'+image+'" style="width 85px;" width="85px"></td>' +
                        '<td style="padding-left: 5px">'+infodata.alamat+'</td></tr>' +
                        '<tr><td style="vertical-align: bottom; font-weight: bold; padding-left: 5px">Rp '+number_format(infodata.harga,0,',','.')+'</td></tr>' +
                        '</tbody>' +
                        '</table>' +
                        '<table style="width: 285px">' +
                        '<tbody>' +
                        '<tr><td>Luas Tanah</td><td>:</td><td style="padding-left: 5px">'+infodata.luas_tanah+' m<sup>2</sup></td></tr>' +
                        '<tr><td>Luas Bangunan</td><td>:</td><td style="padding-left: 5px">'+infodata.luas_bangunan+' m<sup>2</sup></td></tr>' +
                        '<tr><td>Tanggal Penilaian</td><td>:</td><td style="padding-left: 5px">'+infodata.tanggal_pekerjaan+'</td></tr>' +
                        '<tr><td colspan="3" style="vertical-align: bottom;"><a href="'+link+'" target="_blank" class="btn btn-xs btn-primary">Lihat Detil</a></td></tr>' +
                        '</tbody>' +
                        '</table>'; 
            return content;
}
function reset_markers(item_marker) {
    for ( var i=0; i<item_marker.length; i++ ) {
        item_marker[i].setMap(null);
    }
}
function number_format (number, decimals, decPoint, thousandsSep) { 
  number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
  var n = !isFinite(+number) ? 0 : +number
  var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
  var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
  var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
  var s = ''
  var toFixedFix = function (n, prec) {
    var k = Math.pow(10, prec)
    return '' + (Math.round(n * k) / k)
      .toFixed(prec)
  }
  // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || ''
    s[1] += new Array(prec - s[1].length + 1).join('0')
  }
  return s.join(dec)
}