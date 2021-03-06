<?php
/*
 * Author : Arif Kurniawan
 * Email : arif.kurniawan86@gmail.com
 * Website : infoharga123.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
tr.selected {
    background: orange;
}
</style>
<section class="content-header">
    <h1><?php echo $title; ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $title; ?></li>
    </ol>
</section>
<section class="content">
  
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="dt-button btn btn-sm btn-primary" tabindex="0" aria-controls="datatable" href="#" onclick="go_edit_data()">
                                <i class="fa fa-pencil"></i> 
                                <span> Edit</span>
                            </button>
                        </div>
                    </div>

                    <table class="table table-bordered" id="datatable" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 20px;">No</th>
                                <th>Tipe</th>
                                <th>Data1</th>
                                <th>Data2</th>
                                <th>Data3</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
