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
                            <input type="hidden" class="form-control" name="user_id" id="user_id" placeholder="user_id" value="<?php echo $user_id; ?>" <?php echo $disabled ?> />
                            <div class="form-body">

                                <div class="form-group">
                                    <label> Nama Penghuni</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="<?php echo $nama ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('nama') ?>
                                </div>
                                <div class="form-group">
                                    <label> Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo $email ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('email') ?>
                                </div>
                                <div class="form-group">
                                    <label> Username</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="username" value="<?php echo $username ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('username') ?>
                                </div>
                                <div class="form-group">
                                    <label> Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="phone_number" value="<?php echo $phone_number ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('phone_number') ?>
                                </div>
                                <div class="form-group">
                                    <label> Nomor Identitas</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="no_ktp" id="no_ktp" class="form-control" placeholder="no_ktp" value="<?php echo $no_ktp ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('no_ktp') ?>
                                </div>
                                <div class="form-group">
                                    <label> Tanggal Lahir</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="date" name="phone_number" id="tgl_lahir" class="form-control" placeholder="tgl_lahir" value="<?php echo $tgl_lahir ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('tgl_lahir') ?>
                                </div>
                                <div class="form-group">
                                    <label> Jenis Kelamin</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <select name="jk" id="jk" class="form-control">
                                            <option value=""> -Silahkan Pilih- </option>
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
                                    <label> Sewa / Penghuni Tetap</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <select name="status" id="status" class="form-control">
                                            <option value=""> -Silahkan Pilih- </option>
                                            <option value="1" <?php
                                                                if ($status == '1') echo 'selected'
                                                                ?>> Penghuni Tetap </option>
                                            <option value="00" <?php
                                                                if ($status == '0') echo 'selected'
                                                                ?>> Sewa </option>
                                        </select>
                                    </div>
                                    <?php echo form_error('status') ?>
                                </div>
                                <div class="form-group">
                                    <label> Unit</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <select name="status" id="status" class="form-control">
                                            <option value=""> -- Pilih Unit -- </option>
                                            <?php
                                            foreach ($get_unit as $un) {
                                            ?>
                                                <option value="<?php echo $un->id_unit ?>" <?php
                                                                                            if ($un->id_unit == $idunit) echo 'selected'
                                                                                            ?>> <?php echo $un->nama_unit ?> </option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <?php echo form_error('status') ?>
                                </div>

                                <div class="form-group">
                                    <label> Nomor Rekening</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="nomor_rekening" id="nomor_rekening" class="form-control" placeholder="Nomor Rekening" value="<?php echo $nomor_rekening ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('nomor_rekening') ?>
                                </div>

                                <?php
                                if ($button != "Read") {
                                    if ($button != "Update") {
                                ?>
                                        <div class="form-group">
                                            <label for="exampleInputFile1">Image</label>
                                            <input type="file" name="img" id="img">
                                            <p class="help-block"> some help text here. </p>
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
        window.location.href = "<?php echo base_url() ?>index.php/Penghuni";
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