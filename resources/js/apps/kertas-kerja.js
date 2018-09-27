
$(function(){
    (function(){
        var $input = $('');
        var table = '.table-movefield';
        var $table = $(table);
        var isSubTable = false;
        var x = 0;
        var y = 0;
        var xs = 0;
        var ys = 0;

        jQuery.fn.extend({
            setAsInput: function(){
                return this.each(function(){
                    $(this).attr("data-selectAll", "YES")
                    $input = $(this)
                })
            }
        });

        var moveBottom = (function(){
            // console.log (typeof $input)
            if ($input.attr("data-selectAll") === "YES")
            {
                //
            }
            var $tableRow = $table.children("tbody").children("tr").eq(y);
            var $tableData = $tableRow.children("td,th").eq(x);

            if (isSubTable)
            {
                $tableRow.children("td,th").eq(x).find('.form-control').first().focus().select().setAsInput();
                return;
            }

            $input.removeAttr("data-selectAll");
            $tableData.find(".form-control").focus().select().setAsInput()
        });

        //NAVIGATOR
        $(document).find($table).on("keypress", function(event) {
            // $input = $(event.target).parent(".form-control");
            var keyCode = event.keyCode;
            if(keyCode !== 13) return;
            event.preventDefault();
            y++;
            moveBottom();
        });

        //NAVIGATOR
        $(document).find($table).on("keydown", function(event) {
            var keyCode = event.keyCode;

            switch(keyCode) {
                case 37:
                    event.preventDefault();
                    x--;
                    break;
                case 38:
                    event.preventDefault();
                    y--;
                    break;
                case 39:
                    event.preventDefault();
                    x++;
                    break;
                case 40:
                    event.preventDefault();
                    y++;
                    break;
                default:
                    return;
                    break;
            }

            if (x<0) {
                x = 0;
            }

            if (y<0) {
                y = 0;
            }

            moveBottom();
        });

        //INITIATOR
        $(document).find($table).on("click", ".form-control", function(){
            if (isSubTable) {
                return;
            }

            $table = $(this).closest(table);
            $(this).setAsInput();
            
            x = $table.find($(this)).closest("td").index();
            y = $table.find($(this)).closest("tr").index();
        });

        //Databanding
        $(document).find($table).children("tbody").children("tr").children("td").children(".form-control").on("focus", function(even){
            x = $table.find($(this)).closest("td").index();
            y = $table.find($(this)).closest("tr").index();
            isSubTable = false;
        });

        // Databanding Adjustment
        $(document).find($table).find("table").find("td .form-control").on("focus", function(even){
            var $tr = $(this).closest('table').parent('td').parent('tr');
            var $td = $(this).closest('table').parent('td');
            $table.children("tbody").children("tr").each(function(i){
                if ($(this).is($tr))
                {
                    y = i;

                    $(this).children("td,th").each(function(i){
                        if ($(this).is($td))
                        {
                            x = i;
                        }
                    });
                    isSubTable = true;
                }
            });
            return;
        });
    })();
});

//PREDEFINED DEPRESIASI SARANA PELENGKAP
$(function(){

    if (["1","2","5"].indexOf(id_jenis_objek)==-1){
        return;
    }

    $.post(base_url+"new/depresiasi_sarana_pelengkap/get_list_json",{id_jenis_objek:id_jenis_objek}).done(function(d){
        var data;
        try {
            data=JSON.parse(d);
        }catch(e){
            console.log(e);
        }

        $.each(data,function(i,v){
            var id_field = v.id_field;
            var nilai = v.nilai;
            $('[data-id-field="'+id_field+'"]').val(nilai);
        })
    })
});

//Laampiran kertas kerja

$(document).on("click", '#btn_upload_multi', function(event){
    if (window.confirm("Apakah Anda yakin?"))
    {
        var multi_file  = "";
        var data        = new FormData();
        jQuery.each(jQuery('#multi_image')[0].files, function(i, file) {
            data.append('file-'+i, file);
        });
        
        if ($("#multi_urut").val() == "" || $("#multi_keterangan").val() == "" || !data)
        {
            generate_notification("error", "File, No. Urut dan Keterangan tidak boleh kosong.", "topCenter");
        }
        else
        {
            $.ajax({
                url: base_url + "Ajax/do_upload_multi/?files",
                type: 'POST',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data)
                {
                    $.ajax({
                        type        : "POST",
                        url         : base_url + "Ajax/do_upload_multi_table/",
                        data        : {
                            id_lokasi           : $("#id_lokasi").val(),
                            multi_file          : data,
                            multi_urut          : $("#multi_urut").val(),
                            multi_keterangan    : $("#multi_keterangan").val()
                        },
                        success     : function (data) {
                            var $imgCol = $(data);
                            $imgCol.find('img').attr('class', 'img-responsive').removeAttr('style');
                            $imgCol.toggleClass('col-lg-6 col-sm-2');
                            $imgCol.find("img").each(function(){

                                var arrData = $(this).attr("src").split("."); 
                                var ext = arrData.splice(-1,1);
                                var thumb = arrData.join(".");
                                thumb +=  "-thumb";
                                thumb += "."+ext;
                                $(this).attr("src", thumb);
                            })
                            $imgCol.appendTo("#image_lampiran");
                            $("#multi_image").val("");
                            $("#multi_urut").val("");
                            $("#multi_keterangan").val("");
                        }
                    });


                    var dataLampiran = {
                        "id_lokasi" : $("#id_lokasi").val(),
                        "jenis_lampiran" : "Foto Properti",
                        "lampiran" : data,
                        "no_urut" : $("#multi_urut").val(),
                        "keterangan" : $("#multi_keterangan").val()
                    };

                    $.post(base_url+"new/pekerjaan/ajax_update_lampiran", dataLampiran).done(function() {
                    });
                }
            });
        }
    }
});

$(document).on("click", '.btn-delete-image-multi', function() {
    if (window.confirm("Apakah Anda yakin?"))
    {
        var id_field_multi  = $(this).attr("data-id");
        var multifile       = $(this).attr("data-file");
        var elt = $('#image_lampiran').find('.list_' + multifile);
        
        $.ajax({
            type        : "POST",
            url         : base_url + "ajax/delete_data/multi_image",
            dataType    : "JSON",
            data        : {
                id  : id_field_multi
            },
            success     : function (data) {
                generate_notification(data.result.trim(), data.message.trim(), "topCenter");
                if (data.result.trim() == "success"){
                    elt.remove();
                }
            },
        });
    }
});

// For Upload file
$(function(){
    // Variable to store your files
    var files;

    // Add events
    $(document).on("change", '.tmp_file', function(event){
        var $input = $(this);
        var file = this.files[0];
        var img = new Image();
        var _URL = window.URL || window.webkitURL;
        if ((file = this.files[0])) {
            img.onload = function () {
                var data_name_field = $input.attr("data-name-field");
                var data_id_field   = $input.attr("data-id-field");
                var data_keterangan = $input.attr("data-keterangan");
                prepareUpload(event, data_name_field, data_id_field, data_keterangan);
            };
            img.src = _URL.createObjectURL(file);
        }
    });
    
    $(document).on("change", '.tmp_file', function(event){
        var $input = $(this);
        var file = this.files[0];
        var img = new Image();
        var _URL = window.URL || window.webkitURL;
        if ((file = this.files[0])) {
            img.onload = function () {
                var data_name_field = $input.attr("data-name-field");
                var data_id_field   = $input.attr("data-id-field");
                var data_keterangan = $input.attr("data-keterangan");
                prepareUpload(event, data_name_field, data_id_field, data_keterangan);
            };
            img.src = _URL.createObjectURL(file);
        }
    });
    
    function prepareUpload(event, data_name_field, data_id_field, data_keterangan)
    {
        files = event.target.files;
        uploadFiles(event, data_name_field, data_id_field, data_keterangan);
    }

    function uploadFiles(event, data_name_field, data_id_field, data_keterangan)
    {
        event.stopPropagation();
        event.preventDefault();
        var data = new FormData();
        $.each(files, function(key, value)
        {
            data.append(key, value);
        });
        
        $.ajax({
            url: base_url + "Ajax/do_upload_data/?files",
            type: 'POST',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data)
            {
                if (data != "")
                {
                    var arrData = data.split("."); 
                    var ext = arrData.splice(-1,1);
                    var thumb = arrData.join(".");
                    thumb +=  "-thumb";
                    thumb += "."+ext;

                    if (data_keterangan == "") {
                        $("#textbox_" + data_name_field).val(data).updateTextbox();
                        $("#img_" + data_name_field)
                            .attr("src",  base_url + "asset/file/" + thumb)
                            .attr("class",  "img-responsive")
                        ;
                    }
                    else
                    {
                        $(".textbox-" + data_id_field + "-" + data_keterangan).val(data).updateTextbox();
                        $(".img-" + data_id_field + "-" + data_keterangan)
                            .attr("src", base_url + "asset/file/" + thumb)
                            .attr("class",  "img-responsive")
                        ;
                    }
                }
            }
        });
    }
});
