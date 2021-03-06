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
                        <form role="form" method="post" action="<?php echo base_url() . $form_action ?>" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="id" id="id" placeholder="id" value="<?php echo $id; ?>" <?php echo $disabled ?> />
                            <div class="form-body">

                                <div class="form-group">
                                    <label> Nama Anggota Keluarga Penghuni</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="<?php echo $nama ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('nama') ?>
                                </div>
                                <div class="form-group">
                                    <label> Nama Penghuni</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <select name="user_id" id="user_id" class="form-control" <?php echo $disabled ?>>
                                            <option value="" disabled selected> -- Pilih Penghuni -- </option>
                                            <?php
                                            foreach ($get_all_user as $un) {
                                            ?>
                                                <option value="<?php echo $un->user_id ?>" <?php
                                                                                            if ($un->user_id == $user_id) echo 'selected'
                                                                                            ?>> <?php echo $un->nama ?> </option>
                                            <?php } ?>

                                        </select> <?php echo form_error('user_id') ?>
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label> Tanggal Lahir</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="tgl_lahir" value="<?php echo $tgl_lahir ?>" <?php echo $disabled ?>> </div>
                                        <?php echo form_error('tgl_lahir') ?>
                                    </div>

                                    <div class="form-group">
                                        <label> Jenis Kelamin</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <select name="jk" id="jk" class="form-control" <?php echo $disabled ?>>
                                                <option value="" disabled selected> -- Pilih Jenis Kelamin -- </option>
                                                <option value="Laki-laki" <?php
                                                                            if ($jk == 'Laki-laki') echo 'selected'
                                                                            ?>> Laki-laki </option>
                                                <option value="Perempuan" <?php
                                                                            if ($jk == 'Perempuan') echo 'selected'
                                                                            ?>> Perempuan </option>
                                            </select>
                                        </div>
                                        <?php echo form_error('jk') ?>
                                    </div>
                                    <div class="form-group">
                                        <label> Hubungan dengan Penghuni</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <select name="hubungan" id="hubungan" class="form-control" <?php echo $disabled ?>>
                                                <option value="" disabled selected> -- Pilih Hubungan -- </option>
                                                <?php
                                                foreach ($get_all_hubungan as $hb) {
                                                ?>
                                                    <option value="<?php echo $hb->id ?>" <?php
                                                                                                if ($hb->role_name == $hubungan) echo 'selected'
                                                                                                ?>> <?php echo $hb->role_name ?> </option>
                                                <?php } ?>

                                            </select> 
                                        </div>
                                        <?php echo form_error('hubungan') ?>
                                    </div>

                                    <?php
                                    if ($button != "Read") {
                                        if ($button != "Update") {
                                    ?>
                                            <div class="form-group">
                                                <label for="exampleInputFile1">Image</label>
                                                <input type="file" name="img" id="img">
                                                <p class="help-block">max size 2mb, file format jpg, png, jpeg, bmp.</p>
                                            </div>
                                        <?php
                                        } else {

                                        ?>
                                            <div class="form-group">
                                                <label for="exampleInputFile1">Image</label>
                                            </div>
                                            <div class="form-group">
                                                <img width="10%" src="<?php echo $img ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile1">Image</label>
                                                <input type="file" name="img" id="img">
                                                <p class="help-block"> some help text here. </p>
                                            </div>
                                        <?php                                    }
                                    } else {
                                        ?>
                                        <div class="form-group">
                                            <label for="exampleInputFile1">Image</label>
                                        </div>
                                        <div class="form-group">
                                            <img width="10%" src="<?php echo $img ?>">
                                        </div>
                                    <?php

                                    }
                                    ?>


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
        window.location.href = "<?php echo base_url() ?>index.php/Keluarga_penghuni";
    }

    $(document).ready(function() {
        $('#summernote_2').summernote({
            tabsize: 2,
            height: 300,
            callbacks: {
                // onImageUpload: function(image) {
                //     uploadImage(image[0]);
                // },
                // onMediaDelete: function(target) {
                //     deleteImage(target[0].src);
                // }
            }
        });
    });
</script>