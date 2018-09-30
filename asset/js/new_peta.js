var map;
var temp_marker = [];
var markers = [];
var searchBox;
var current_query_string_jo = '';
var current_query_string_wilayah = '';
if ( typeof google != 'undefined' ) {
    var MyLatLng = new google.maps.LatLng(-2.324692889647872, 116.43085760498047);
    var CurrentLatLng = MyLatLng;
}
$(document).ready(function() {
	$('#formPeta').modal({show:false});
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
	load_list_obyek(1);
    $('input[name="jenis_objek[]"]').click(function() {
        var obj_jo = $('#filter_jenis_obyek').children().find('input[type="checkbox"]');
        var query_string = '';
        obj_jo.each(function() {
            if ( $(this).is(':checked') ) {
                query_string += $(this).val()+';';
            }
        });
        if ( query_string != '' ) {
            query_string = query_string.substring(0, (query_string.length-1));
            if ( current_query_string_wilayah != '' ) {
                load_list_obyek(1, 'jenis_objek='+escape(query_string)+'&'+current_query_string_wilayah);
            } else {
                load_list_obyek(1, 'jenis_objek='+escape(query_string));
            }
        }
        current_query_string_jo = query_string;
        return null;
    });
	if ( typeof MyLatLng != 'undefined' ) {
        var mapProp = {
            mapTypeId:google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            center:MyLatLng,
            zoom:13,
        };
        map=new google.maps.Map(document.getElementById("map_area"),mapProp);
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        markers = [];
        map.addListener('dragend', function() {
            // 3 seconds after the center of the map has changed, pan back to the
            // marker.
            load_map_by_extent();    
        });


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
            load_map_by_extent();
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
});
function load_list_obyek(page, query_string) {
    $('#list_loader').show();
    var uri = base_url + 'peta/list_obyek?page=' + page;
    if ( typeof query_string == 'string' ) {
        uri += '&'+query_string;
    }
    $('#list_box').load( uri, function( response, status, xhr ) {
        if ( status == "error" ) {
            //hide_loader();
            var msg = "Sorry but there was an error: ";
            alert( msg + xhr.status + " " + xhr.statusText );
        }
        $('#list_loader').hide();
    });
}
function show_infowindow(infodata) {
	var link = base_url + '';
            if ( infodata.foto_1 != '' && infodata.foto_1 != null && infodata.foto_1 != 'null') {
                var image = base_url+'asset/file/'+infodata.foto_1;
            } else{
                var image = base_url+'asset/images/property_icon.png';
            }
            var content = '<table style="width: 280px">' +
                        '<tbody>' +
                        '<tr><td rowspan="5" style="width: 85px"><img src="'+image+'" style="width 85px;" width="85px"></td>' +
                        '<td style="padding-left: 4px; text-align: left">'+infodata.alamat+'</td></tr>' +
                        '<tr><td style="vertical-align: bottom; font-weight: bold;padding-left: 4px; text-align: left">Rp '+number_format(infodata.nilai_pasar,0,',','.')+'</td></tr>' +
                        '<tr><td style="padding-left: 4px; text-align: left">LT : '+number_format(infodata.luas_tanah,0,',','.')+' M<sup>2</sup>, LB : '+number_format(infodata.luas_bangunan,0,',','.')+' M<sup>2</sup></td></tr>' +
                        '<tr><td style="padding-left: 4px; text-align: left">Tanggal Penilaian : '+infodata.tanggal_penilaian+'</td></tr>' +
                        '<tr><td style="vertical-align: bottom; text-align: right;"><a href="'+link+'" target="_blank" class="btn btn-xs btn-primary">Lihat Detil</a></td></tr>' +
                        '</tbody>' +
                        '</table>'; 
            return content;
}
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}
function filter_wilayah() {
    var provinsi = $('#provinsi').val();
    var kota = $('#kota').val();
    var kecamatan = $('#kecamatan').val();
    var desa = $('#desa').val();
    var query_string = '';
    if ( provinsi != '' ) 
        query_string += 'provinsi='+provinsi+'&';
    if ( kota != '' ) 
        query_string += 'kota='+kota+'&';
    if ( kecamatan != '' ) 
        query_string += 'kecamatan='+kecamatan+'&';
    if ( desa != '' ) 
        query_string += 'desa='+desa+'&';

    if ( query_string != '' ) {
        query_string = query_string.substring(0,(query_string.length-1));
        var uri_filter = '';
        if ( current_query_string_jo != '' )
            uri_filter = current_query_string_jo+'&'+query_string;
        else
            uri_filter = query_string;
        load_list_obyek(1, uri_filter);
    }
    current_query_string_wilayah = query_string;
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
function reset_markers(item_marker) {
    for ( var i=0; i<item_marker.length; i++ ) {
        item_marker[i].setMap(null);
    }
}
function load_page(page) {
    var uristring = '';
    if ( current_query_string_jo != '' ) {
        uristring += current_query_string_jo + '&';
    }
    if ( current_query_string_wilayah != '' ) {
        uristring += current_query_string_wilayah + '&';
    }
    if ( uristring != '' ) {
        uristring = uristring.substring(0,(uristring.length-1));
    }

    load_list_obyek(page, uristring);
    window.scrollTo(0, 0);
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
function open_infowindow(index) {
    google.maps.event.trigger(markers[index], "click", {});
}
function load_map_by_extent(){
    reset_markers(markers);
            $('#map_loader').show();
            var bounds = map.getBounds();
            var ne = bounds.getNorthEast(); 
            var sw = bounds.getSouthWest();
            var x1 = sw.lng();
            var x2 = ne.lng();
            var y1 = sw.lat();
            var y2 = ne.lat();
            $.ajax({
                type: "GET",
                url: base_url + "peta/get_data_lokasi?x1="+x1+"&y1="+y1+"&x2="+x2+"&y2="+y2,
                success: function(msg) {
                    var data = JSON.parse(msg);
                    var pointer = data;
                    var index = markers.length;
                    var jum_banding = 0;
                    var jum_obyek = 0;
                    var banding_content = '<table class="table table-hover table-bordered" id="tbl_info_banding" style="display: none;"><thead>'+
                                          '<tr><th>Data Banding</th></tr>'+
                                          '</thead><tbody>';
                    var obyek_content = '<table class="table table-hover table-bordered" id="tbl_info_obyek"><thead>'+
                                          '<tr><th>Data Obyek</th></tr>'+
                                          '</thead><tbody>';
                    for ( var i=0; i<pointer.length; i++ ) {
                        var LatLngPoint = new google.maps.LatLng(parseFloat(pointer[i].latitude), parseFloat(pointer[i].longitude));
                        var info = pointer[i];
                        var marker = new google.maps.Marker({
                            map: map,
                            icon: base_url + "asset/images/aset-icon/" + pointer[i].icon,
                            position: LatLngPoint
                        });
                        markers.push(marker);
                        var content = show_infowindow(pointer[i]);
                        var info = new SnazzyInfoWindow({
                            marker: marker,
                            content: content,
                            closeOnMapClick: true,
                            closeWhenOthersOpen: true
                        });
                        if ( pointer[i].foto_1 != '' && pointer[i].foto_1 != null && pointer[i].foto_1 != 'null') {
                            var image = base_url+'asset/file/'+pointer[i].foto_1;
                        } else{
                            var image = base_url+'asset/images/property_icon.png';
                        }

                        if ( pointer[i].type === 'banding' ) {
                            banding_content += '<tr>'+
                                               '<td class="text-left" style="cursor: pointer" onclick="open_infowindow('+index+')"><img src="'+image+'" style="width: 90px; float: left; margin-right: 5px">'+
                                               pointer[i].alamat+'<br/>'+
                                               'Rp '+number_format(pointer[i].nilai_pasar,0,',','.')+'<br/>'+
                                               'LT : '+number_format(pointer[i].luas_tanah,0,',','.')+' M<sup>2</sup>, LB : '+number_format(pointer[i].luas_bangunan,0,',','.')+' M<sup>2</sup></td>'+
                                               '</tr>';
                            jum_banding++;
                        } else if ( pointer[i].type === 'obyek' ) {
                            obyek_content   += '<tr>'+
                                               '<td class="text-left" style="cursor: pointer" onclick="open_infowindow('+index+')"><img src="'+image+'" style="width: 90px; float: left; margin-right: 5px">'+
                                               pointer[i].alamat+'<br/>'+
                                               'Rp '+number_format(pointer[i].nilai_pasar,0,',','.')+'<br/>'+
                                               'LT : '+number_format(pointer[i].luas_tanah,0,',','.')+' M<sup>2</sup>, LB : '+number_format(pointer[i].luas_bangunan,0,',','.')+' M<sup>2</sup></td>'+
                                               '</tr>';
                            jum_obyek++;
                        }
                        index++;
                    }

                    banding_content += '</tbody></table>';
                    obyek_content   += '</tbody></table>';
                    var info_content = '';
                    if ( jum_obyek == 0 && jum_banding == 0 ) {
                        info_content = 'Obyek tidak tersedia diwilayah ini.';
                    } else {
                        if ( jum_obyek > 0 ) {
                            info_content += obyek_content;
                        }
                        if ( jum_banding > 0 ) {
                            info_content += banding_content;
                        }
                    }
                    $('#box_banding').html(info_content);
                    $('#map_loader').hide();
                    $('#formPeta').modal('show');
                },
                error: function(xhr, msg, e) {
                    $('#map_loader').hide();
                    console.log(xhr.responseText);
                }
            });
}