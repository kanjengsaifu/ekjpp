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
                            <span>Tipe</span>
                            <span class="required">*</span>
                            </label>
                           <div class="col-md-9 col-sm-9 col-xs-12">
                               <input type="text" class="form-control" name="tipe" value="<?php echo empty($detail['tipe']) ? NULL : $detail['tipe']; ?>" max=100 required <?php echo $attr_readonly ?>>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            <span>Data1</span>
                            <span class="required">*</span>
                            </label>
                           <div class="col-md-9 col-sm-9 col-xs-12">
                               <input type="text" class="form-control" name="data1" value="<?php echo empty($detail['data1']) ? NULL : $detail['data1']; ?>" max=100 required <?php echo $attr_readonly ?>>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            <span>Data2</span>
                            <span class="required">*</span>
                            </label>
                           <div class="col-md-9 col-sm-9 col-xs-12">
                               <input type="text" class="form-control" name="data2" value="<?php echo empty($detail['data2']) ? NULL : $detail['data2']; ?>" max=100 required <?php echo $attr_readonly ?>>
                           </div>
                       </div>
                        <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            <span>Data3</span>
                            <span class="required">*</span>
                            </label>
                           <div class="col-md-9 col-sm-9 col-xs-12">
                               <input type="number" class="form-control" name="data3" value="<?php echo empty($detail['data3']) ? NULL : $detail['data3']; ?>" required>
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
</script>