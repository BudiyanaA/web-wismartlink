<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1><?php echo ucfirst($folder) ?>
                    <small><?php
                            $pages = str_replace("_", " ", $page);
                            echo $pages ?></small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PAGE TOOLBAR -->
            <!-- END PAGE TOOLBAR -->
        </div>
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>index.php/admin/Home">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active"><?php echo $pages ?></span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> <?php echo $page ?></span>
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                                <!-- <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-pencil"></i> Edit </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-trash-o"></i> Delete </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-ban"></i> Ban </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="javascript:;"> Make admin </a>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" method="post" action="<?php echo base_url() . $form_action ?>" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="form-group">
                                    <label> Nama</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="<?php echo $nama ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('nama') ?>
                                </div>
                                <div class="form-group">
                                    <label> Maintenance</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i> 
                                        </span>
                                        <input type="text" name="request" id="request" class="form-control" placeholder="request" value="<?php echo $request ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('request') ?>
                                </div>
                                <div class="form-group">
                                    <label> Tanggal Permintaan Request</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="request_date" id="request_date" class="form-control" placeholder="Tanggal Permintaan Request" value="<?php echo $request_date ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('request_date') ?>
                                </div>
                                <div class="form-group">
                                    <label> Alamat</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <textarea class="form-control" name="alamat" id="alamat"><?php echo $alamat ?></textarea>
                                    </div>
                                    <?php echo form_error('alamat') ?>
                                </div>
                                <div class="form-group">
                                    <label> Lunas ?</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="is_paid" id="is_paid" class="form-control" placeholder="Is Paid" value="<?php echo $is_paid ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('is_paid') ?>
                                </div>
                                <div class="form-group">
                                    <label> Status </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="status" id="status" class="form-control" placeholder="Status" value="<?php echo $status ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('status') ?>
                                </div>
                                <div class="form-group">
                                    <label> Biaya </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="charge" id="charge" class="form-control" placeholder="charge" value="<?php echo number_format($charge, 2) ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('charge') ?>
                                </div>
                                <div class="form-group">
                                    <label> Invoice No </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="invoice_no" id="invoice_no" class="form-control" placeholder="Invoice No" value="<?php echo $invoice_no ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('invoice_no') ?>
                                </div>
                                <div class="form-group">
                                    <label> Tanggal Bayar </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="tanggal_bayar" id="tanggal_bayar" class="form-control" placeholder="Tanggal Bayar" value="<?php echo $tanggal_bayar ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('tanggal_bayar') ?>
                                </div>
                                <div class="form-group">
                                    <label> Nama Teknisi </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="nama_teknisi" id="nama_teknisi" class="form-control" placeholder="Nama Teknisi" value="<?php echo $nama_teknisi ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('nama_teknisi') ?>
                                </div>

                                <div class="form-actions">
                                    <?php
                                    if ($button != "Read") {
                                    ?>
                                        <button type="submit" class="btn blue"><?php echo $button ?></button>
                                    <?php
                                    }
                                    ?>
                                    <button type="button" onclick="back()" class="btn default">Back</button>
                                </div>
                        </form>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>
<script>
    function back() {
        window.location.href = "<?php echo base_url() ?>index.php/Maintenance";
    }
</script>