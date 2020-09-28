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

                            </div>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div id="loading" style="display:none;background:url(<?php echo base_url() ?>assets/images/Rolling-1s-200px.gif) no-repeat center;height:300px"></div>
                        <form role="form" method="post" action="<?php echo base_url() . $form_action ?>" enctype="multipart/form-data" onsubmit="$('#loading').show();$('.banners').hide()">
                            <input type="hidden" class="form-control" name="id" id="id" placeholder="id" value="<?php echo $id; ?>" <?php echo $disabled ?> />
                            <div class="form-group">
                                <label> Judul</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Judul" value="<?php echo $title ?>" <?php echo $disabled ?>> </div>
                                <?php echo form_error('title') ?>
                            </div>

                            <div class="form-group">
                                <label> Deskripsi</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="text" name="description" id="description" class="form-control" placeholder="Deskripsi" value="<?php echo $description ?>" <?php echo $disabled ?>> </div>
                                <?php echo form_error('description') ?>
                            </div>

                            <?php
                            if ($button != "Read") {
                            ?>
                                <div class="form-group">
                                    <label for="exampleInputFile1">Gambar</label>
                                    <input type="file" name="image" id="image">
                                    <p class="help-block">max size 2mb, file format jpg, png, jpeg, bmp.</p>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="form-group">
                                    <label for="exampleInputFile1">Gambar</label>
                                </div>
                                <div class="form-group">
                                    <img width="30%" src="<?php echo $image ?>">
                                </div>
                            <?php

                            }
                            ?>

                            <div class="form-actions banners">
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
        window.location.href = "<?php echo base_url() ?>index.php/Voucher";
    }
</script>