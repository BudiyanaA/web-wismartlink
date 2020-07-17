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
                            <input type="hidden" class="form-control" name="id_gedung" id="id_gedung" placeholder="id_gedung" value="<?php echo $id_gedung; ?>" <?php echo $disabled ?> />
                            <div class="form-body">

                                <div class="form-group">
                                    <label> Kode Gedung</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="kode_gedung" id="kode_gedung" class="form-control" placeholder="Kode Gedung" value="<?php echo $kode_gedung ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('kode_gedung') ?>
                                </div>
                                <div class="form-group">
                                    <label> Nama Gedung</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="nama_gedung" id="nama_gedung" class="form-control" placeholder="Nama Gedung" value="<?php echo $nama_gedung ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('nama_gedung') ?>
                                </div>
                                <!-- <div class="form-group">
                                    <label> Nama Apartemen</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <select name="id_apt" id="id_apt" class="form-control">
                                            <option value=""> -- Pilih Apartemen -- </option>
                                            <?php
                                            foreach ($get_all_apt as $un) {
                                            ?>
                                                <option value="<?php echo $un->id_apt ?>" <?php
                                                                                            if ($un->id_apt == $id_apt) echo 'selected'
                                                                                            ?>> <?php echo $un->nama_apt ?> </option>
                                            <?php } ?>

                                        </select> <?php echo form_error('id_apt') ?>
                                    </div> -->
                                    <div class="form-group">
                                        <label> Kota</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="text" name="kota" id="kota" class="form-control" placeholder="kota" value="<?php echo $kota ?>" <?php echo $disabled ?>> </div>
                                        <?php echo form_error('kota') ?>
                                    </div>

                                    <div class="form-group">
                                        <label> Alamat </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <textarea class="form-control" name="alamat" id="alamat"><?php echo $alamat ?></textarea>
                                        </div>
                                        <?php echo form_error('alamat') ?>
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
        window.location.href = "<?php echo base_url() ?>index.php/Gedung";
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