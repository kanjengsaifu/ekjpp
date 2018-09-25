<?php
$data_akhir = count($lokasi) < 1 ? 0 : ($data_ke+count($lokasi))-1;
echo '<span>Data ke '.$data_ke.'-'.$data_akhir.' dari '.$count_obyek.' data</span>';
$i = 1;
foreach ($lokasi as $item) {
	$list_foto_objek = $this->peta_model->get_foto_objek($item->id);
	$foto = $foto_2 = NULL;
	foreach ($list_foto_objek as $fo) {
		if ( empty($foto) ) {
			$foto = $fo->lampiran;
		} else if ( empty($foto_2) ) 
			$foto_2 = $fo->foto_2;
	}
	if ( !empty($foto) && !file_exists('./asset/file/'.$foto) )
		$foto = NULL;
	if ( !empty($foto_2) && !file_exists('./asset/file/'.$foto_2) )
		$foto_2 = NULL;
	if ( empty($foto) )
		$image_src = base_url().'asset/images/property_icon.png';
	else
		$image_src = base_url().'asset/file/'.$foto;

	$tanggal_penilaian = $item->tanggal_mulai;
	$tanggal_penilaian = empty($tanggal_penilaian) ? '-' : $tanggal_penilaian;

	$alamat = $item->alamat;
	$alamat .= empty($item->gang) ? NULL : ' Gang '.$item->gang;
	$alamat .= empty($item->nomor) ? NULL : ' No. '.$item->nomor;
	$alamat .= empty($item->rt) ? NULL : ' RT '.$item->rt;
	$alamat .= empty($item->rw) ? NULL : ' RW '.$item->rw;
	$alamat .= empty($item->desa) ? NULL : ', '.$item->desa;
	$alamat .= empty($item->kecamatan) ? NULL : ', '.$item->kecamatan;
	$alamat .= empty($item->kota) ? NULL : ', '.$item->kota;
	$alamat .= empty($item->provinsi) ? NULL : ', '.$item->provinsi;
	$label_luas_tanah = 'Luas Tanah';
	$label_luas_bangunan = 'Luas Bangunan';
	if ( $item->id_jenis_objek == 6 ) {
		$label_luas_bangunan = 'Luas Ruang';
	}
	$icon_name = 'tanah';
			switch ($item->id_jenis_objek) {
				case 1:
					$icon_name = 'tanah';
					break;
				case 2:
					$icon_name = 'tanah';
					break;
				case 3:
					$icon_name = 'kios';
					break;
				case 5:
					$icon_name = 'ruko';
					break;
				case 6:
					$icon_name = 'apartemen';
					break;
				default:
					$icon_name = 'apartemen';
					break;
			}
	$data_obyek = get_nilai_pasar_objek($item->id, $item->id_jenis_objek);
	$list_pembanding = $this->peta_model->get_list_pembanding($item->id);
	$result_location = array();
	$result_location[] = array(
		'id'	=> $item->id,
		'type'	=> 'obyek',
		'latitude' => $item->latitude,
		'longitude' => $item->longitude,
		'jenis_objek'	=> $item->jenis_objek,
		'foto_1'		=> preg_replace("/[\n\r]/","",$foto),
		'foto_2'		=> preg_replace("/[\n\r]/","",$foto_2),
		'icon'	=> $icon_name.'.png',
		'tanggal_penilaian'	=> $tanggal_penilaian,
		'alamat'	=> addslashes($alamat),
		'luas_tanah'	=> empty($data_obyek['luas_tanah']) ? '-' : $data_obyek['luas_tanah'],
		'luas_bangunan'	=> empty($data_obyek['luas_bangunan']) ? '-' : $data_obyek['luas_bangunan'],
		'label_tanah'	=> empty($label_luas_tanah) ? '-' : $label_luas_tanah,
		'label_bangunan' => empty($label_luas_bangunan) ? '-' : $label_luas_bangunan,
		'nilai_pasar'	=> $data_obyek['nilai_pasar'],
		'nilai_likuidasi'	=> $data_obyek['nilai_likuidasi']
	);
	foreach ($list_pembanding as $lp) {
		$result_location[] = array(
			'id'	=> $item->id,
			'type'	=> 'banding',
			'latitude' => $lp->latitude,
			'longitude' => $lp->longitude,
			'jenis_objek'	=> $item->jenis_objek,
			'foto_1'		=> preg_replace("/[\n\r]/","",$lp->foto_1),
			'foto_2'		=> preg_replace("/[\n\r]/","",$lp->foto_2),
			'icon'	=> $icon_name.'_pembanding.png',
			'tanggal_penilaian'	=> $tanggal_penilaian,
			'alamat'	=> addslashes($lp->alamat),
			'luas_tanah'	=> empty($lp->luas_tanah) ? '-' : $lp->luas_tanah,
			'luas_bangunan'	=> empty($lp->luas_bangunan) ? '-' : $lp->luas_bangunan,
			'label_tanah'	=> $label_luas_tanah,
			'label_bangunan' => $label_luas_bangunan,
			'nilai_pasar'	=> $lp->nilai_pasar,
			'nilai_likuidasi'	=> $lp->nilai_likuidasi
		);
	}
	?>
	<div class="box box-danger box-solid">
		<div class="box-header with-border">
			<?php echo $item->jenis_objek ?>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-lg-4 col-sm-12 col-xs-12">
					<img src="<?php echo $image_src ?>" class="img-responsive img-thumbnail">
				</div>
				<div class="col-lg-8 col-sm-12 col-xs-12">
					<span class="fa fa-map-marker"></span> <?php echo $alamat ?>
					<p>
					<table class="table" style="margin-bottom: 0px">
						<tbody>
							<tr>
								<td style="width: 120px"><?php echo $label_luas_tanah ?></td>
								<td class="text-center" style="width: 20px">:</td>
								<td><?php echo empty($data_obyek['luas_tanah']) ? '-' : number_format($data_obyek['luas_tanah'],0,',','.').'m<sup>2</sup>'; ?></td>
							</tr>
							<tr>
								<td><?php echo $label_luas_bangunan ?></td>
								<td class="text-center" style="width: 20px">:</td>
								<td><?php echo empty($data_obyek['luas_bangunan']) ? '-' : number_format($data_obyek['luas_bangunan'],0,',','.').'m<sup>2</sup>'; ?></td>
							</tr>
							<tr>
								<td>Harga Pasar</td>
								<td class="text-center" style="width: 20px">:</td>
								<td><?php echo empty($data_obyek['nilai_pasar']) ? '-' : 'Rp '.number_format($data_obyek['nilai_pasar'],0,',','.'); ?></td>
							</tr>
						</tbody>

						<tfoot>
							<tr>
								<td colspan="3" class="text-right">
									<button class="btn btn-xs btn-primary"><span class="fa fa-eye"></span> Lihat Detil</button>
									<button class="btn btn-xs btn-primary" data-location='<?php echo preg_replace('/\s\s+/', '',preg_replace("/[\n\r]/","",json_encode((array)$result_location))); ?>' onclick="lihat_peta(this, '<?php echo $item->id; ?>')"><span class="fa fa-map-signs"></span> Lihat Pada Peta</button></td>
							</tr>
						</tfoot>
					</table>
					</p>
				</div>
			</div>
		</div>
	</div>
	<?php
	$i++;
}
if ( $jum_page > 0 ) {
	if ( $page == $jum_page && $page > 1 ) {
		?>
		<div class="row">
			<div class="col-lg-12 text-right">
				<button class="btn btn-default" type="button" onclick="load_page(<?php echo ($page-1); ?>, )">&laquo; Sebelumnya</button>
				<button class="btn btn-default" type="button" disabled><?php echo $page ?></button>
			</div>
		</div>
		<?php
	} else if ( $page < $jum_page && $page > 1 ) {
		?>
		<div class="row">
			<div class="col-lg-12 text-right">
				<button class="btn btn-default" type="button" onclick="load_page(<?php echo ($page-1); ?>)">&laquo; Sebelumnya</button>
				<button class="btn btn-default" type="button" disabled><?php echo $page ?></button>
				<button class="btn btn-default" type="button" onclick="load_page(<?php echo ($page+1); ?>)">Selanjutnya &raquo;</button>
			</div>
		</div>
		<?php
	} else if ( $page == 1 && $jum_page > 1 ) {
		?>
		<div class="row">
			<div class="col-lg-12 text-right">
				<button class="btn btn-default" type="button" disabled><?php echo $page ?></button>
				<button class="btn btn-default" type="button" onclick="load_page(<?php echo ($page+1); ?>)">Selanjutnya &raquo;</button>
			</div>
		</div>
		<?php
	}
}
?>
<script type="text/javascript">
	function lihat_peta(obj, id) {
		var result_location = $(obj).attr('data-location');
		$('#list_loader').show();
		var pointer = JSON.parse(result_location);
		reset_markers(markers);
		markers = [];
        //console.log(list_point);
        var pointer = JSON.parse(result_location);
        var jum_banding = 0;
        var jum_obyek = 0;
        var jum_terdekat = 0;
        var banding_content = '<table class="table table-hover table-bordered"><thead>'+
        					  '<tr><th>Data Banding</th></tr>'+
        					  '</thead><tbody>';
        var obyek_content = '<table class="table table-hover table-bordered"><thead>'+
        					  '<tr><th>Data Obyek</th></tr>'+
        					  '</thead><tbody>';
        var lainnya_content = '<table class="table table-hover table-bordered"><thead>'+
        					  '<tr><th>Obyek Terdekat</th></tr>'+
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
            if ( pointer[i].id == id && pointer[i].type == 'obyek' ) {
            	info.open();
            }
            if ( pointer[i].foto_1 != '' && pointer[i].foto_1 != null && pointer[i].foto_1 != 'null') {
            	var image = base_url+'asset/file/'+pointer[i].foto_1;
	        } else{
	            var image = base_url+'asset/images/property_icon.png';
	        }

            if ( pointer[i].type === 'banding' ) {
            	banding_content += '<tr>'+
								   '<td class="text-left" style="cursor: pointer" onclick="open_infowindow('+i+')"><img src="'+image+'" style="width: 90px; float: left; margin-right: 5px">'+
								   pointer[i].alamat+'<br/>'+
								   'Rp '+number_format(pointer[i].nilai_pasar,0,',','.')+'<br/>'+
								   'LT : '+number_format(pointer[i].luas_tanah,0,',','.')+' M<sup>2</sup>, LB : '+number_format(pointer[i].luas_bangunan,0,',','.')+' M<sup>2</sup></td>'+
								   '</tr>';
				jum_banding++;
            } else if ( pointer[i].type === 'obyek' ) {
	            obyek_content   += '<tr>'+
								   '<td class="text-left" style="cursor: pointer" onclick="open_infowindow('+i+')"><img src="'+image+'" style="width: 90px; float: left; margin-right: 5px">'+
								   pointer[i].alamat+'<br/>'+
								   'Rp '+number_format(pointer[i].nilai_pasar,0,',','.')+'<br/>'+
								   'LT : '+number_format(pointer[i].luas_tanah,0,',','.')+' M<sup>2</sup>, LB : '+number_format(pointer[i].luas_bangunan,0,',','.')+' M<sup>2</sup></td>'+
								   '</tr>';
				jum_obyek++;
            }
        }
        if ( jum_banding === 0 ) {
        	banding_content += '<tr><td class="text-center">Data Banding Tidak Tersedia</td></tr>';
        }
        banding_content += '</tbody></table>';
        obyek_content   += '</tbody></table>';
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
            map.setZoom(15);
        }
        	var bounds = map.getBounds();
            var ne = bounds.getNorthEast(); 
            var sw = bounds.getSouthWest();
            var x1 = sw.lng();
            var x2 = ne.lng();
            var y1 = sw.lat();
            var y2 = ne.lat();
            $.ajax({
                type: "GET",
                url: base_url + "peta/get_data_lokasi?x1="+x1+"&y1="+y1+"&x2="+x2+"&y2="+y2+"&jenis_objek="+current_query_string_jo+"&except="+id,
                success: function(msg) {
                    var data = JSON.parse(msg);
                    var pointer = data;
                    var index_start = markers.length;
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

			            lainnya_content += '<tr>'+
											   '<td class="text-left" style="cursor: pointer" onclick="open_infowindow('+index_start+')"><img src="'+image+'" style="width: 90px; float: left; margin-right: 5px">'+
											   pointer[i].alamat+'<br/>'+
											   'Rp '+number_format(pointer[i].nilai_pasar,0,',','.')+'<br/>'+
											   'LT : '+number_format(pointer[i].luas_tanah,0,',','.')+' M<sup>2</sup>, LB : '+number_format(pointer[i].luas_bangunan,0,',','.')+' M<sup>2</sup></td>'+
											   '</tr>';
						jum_terdekat++;
			            index_start++;
                    }
                    lainnya_content   += '</tbody></table>';
					var info_content = '';
					if ( jum_obyek == 0 && jum_banding == 0 && jum_terdekat == 0 ) {
						info_content = 'Obyek tidak tersedia diwilayah ini.';
					} else {
						if ( jum_obyek > 0 ) {
							info_content += obyek_content;
						}
						if ( jum_banding > 0 ) {
							info_content += banding_content;
						}
						console.log(jum_terdekat);
						if ( jum_terdekat > 0 ) {
							info_content += lainnya_content;
						}
					}
			        $('#box_banding').html(info_content);
                    $('#list_loader').hide();
					$('#formPeta').modal('show');
                },
                error: function(xhr, msg, e) {
                    $('#list_loader').hide();
                    console.log(xhr.responseText);
                }
            });
        
	}
</script>