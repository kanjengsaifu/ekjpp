<?php
/*
 * Author : Arif Kurniawan
 * Email : arif.kurniawan86@gmail.com
 * Website : infoharga123.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- /.row -->
<section class="content-header">
    <h1><?php echo $page_title; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo base_url().$this->module; ?>"><?php echo $page_title; ?></a></li>
        <li class="active"><?php echo $title; ?></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $title; ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post">
                    <div class="box-body">
                        <?php
                        $attr_readonly = "";
                        if (isset($is_edit)) {
                            $attr_readonly = "readonly";
                        }

                        if ( !empty($errMsg) ) {
                            ?>
                            <div class="alert alert-danger" role="alert"><?php echo $errMsg; ?></div>
                            <?php
                        }
                        ?>
                        <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            <span>Surat tugas final</span>
                            <span class="required">*</span>
                            </label>
                           <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control" type="file" id="tmp_file" value="">
                                <input type="hidden" id="surat_tugas_final" name="surat_tugas_final" value="">
                                <div id="surat_tugas_final_box"></div>
                           </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer" style="text-align: center;">
                        <button type="button" class="btn btn-primary" onclick="<?php echo $url_back; ?>">Kembali</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
$(function () {
    $(".textarea").wysihtml5();
    $('.datepicker').datepicker({
        autoclose: true
    });
    $('.cmb_select2').select2({
        theme: 'bootstrap'
    });
});

// For Upload file / PO
$(function() {
    var files;

    $('#tmp_file').on('change', prepareUpload);

    function prepareUpload(event) {
        files = event.target.files;
        uploadFiles(event);
    }

    function uploadFiles(event) {
        event.stopPropagation();
        event.preventDefault();

        var data = new FormData();
        $.each(files, function(key, value) {
            data.append(key, value);
        });

        $.ajax({
            url: base_url + "Ajax/do_upload_data/?files",
            type: 'POST',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data != "") {
                    $("#surat_tugas_final").val(data);
                    $("#surat_tugas_final_box").html("<a href='<?php echo base_url() ?>asset/file/" + data + "' target='_blank'>Download</a>");
                }
            }
        });
    }
});


</script>