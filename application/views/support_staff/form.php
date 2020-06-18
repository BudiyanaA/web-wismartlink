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
                                    <label> Nama Staff</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="nama_staff" id="nama_staff" class="form-control" placeholder="Nama Staff" value="<?php echo $nama_staff ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('nama_staff') ?>
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
                                    <label> Role</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <select name="role" id="role" class="form-control">
                                            <?php
                                            if ($button == 'Update') {
                                                foreach ($get_roles as $row) {
                                            ?>
                                                    <option value="<?php echo $row->id ?>" <?php if ($role == $row->id) {
                                                                                                echo "selected";
                                                                                            } ?>> <?php echo $row->role_name ?> </option>

                                            <?php
                                                }
                                            }
                                            ?>
                                            <option value=""> - Pilih Role - </option>
                                            <?php
                                            foreach ($get_role as $row) {
                                            ?>
                                                <option value="<?php echo $row->id ?>"> <?php echo $row->role_name ?> </option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?php echo form_error('role') ?>
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
        window.location.href = "<?php echo base_url() ?>index.php/Teknisi";
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