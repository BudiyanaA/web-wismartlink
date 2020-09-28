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
                            <input type="hidden" class="form-control" name="id_unit" id="id_unit" placeholder="id_unit" value="<?php echo $id_unit; ?>" <?php echo $disabled ?> />
                            <div class="form-body">

                                <div class="form-group">
                                    <label> Kode Unit</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="kode_unit" id="nama_unit" class="form-control" placeholder="Kode Unit" value="<?php echo $kode_unit ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('kode_unit') ?>
                                </div>
                                <div class="form-group">
                                    <label> Nama Unit</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="text" name="nama_unit" id="nama_unit" class="form-control" placeholder="Nama Unit" value="<?php echo $nama_unit ?>" <?php echo $disabled ?>> </div>
                                    <?php echo form_error('nama_unit') ?>
                                </div>
                                <div class="form-group">
                                    <label> Nama Gedung</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <select name="id_gedung" id="id_gedung" class="form-control"  <?php echo $disabled ?>>
                                            <option value=""> -- Pilih Gedung -- </option>
                                            <?php
                                            foreach ($get_all_gedung as $un) {
                                            ?>
                                                <option value="<?php echo $un->id_gedung ?>" <?php
                                                                                                if ($un->id_gedung == $id_gedung) echo 'selected'
                                                                                                ?>> <?php echo $un->nama_gedung ?> </option>
                                            <?php } ?>

                                        </select> <?php echo form_error('id_gedung') ?>
                                    </div>
                                    <div class="form-group">
                                        <label> Nomor</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="text" name="nomor" id="nomor" class="form-control" placeholder="Nomor" value="<?php echo $nomor ?>" <?php echo $disabled ?>> </div>
                                        <?php echo form_error('nomor') ?>
                                    </div>


                                    <div class="form-group">
                                        <label> Spek</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="text" name="spek" id="spek" class="form-control" placeholder="Spek" value="<?php echo $spek ?>" <?php echo $disabled ?>> </div>
                                        <?php echo form_error('spek') ?>
                                    </div>

                                    <div class="form-group">
                                        <label> Lantai</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="text" name="lantai" id="lantai" class="form-control" placeholder="Lantai" value="<?php echo $lantai ?>" <?php echo $disabled ?>> </div>
                                        <?php echo form_error('lantai') ?>
                                    </div>

                                    <div class="form-group">
                                        <label> Biaya Sewa</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="text" name="biaya_sewa" id="biaya_sewa" class="form-control" placeholder="Biaya Sewa" value="<?php echo $biaya_sewa ?>" <?php echo $disabled ?>> </div>
                                        <?php echo form_error('biaya_sewa') ?>
                                    </div>

                                    <div class="form-group">
                                        <label> Keterangan </label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <textarea class="form-control" name="ket" id="ket" <?php echo $disabled ?>><?php echo $ket ?></textarea>
                                        </div>
                                        <?php echo form_error('ket') ?>
                                    </div>


                                    <?php
                                    if ($button != "Read") {
                                        if ($button != "Update") {
                                    ?>
                                            <div class="form-group">
                                                <label for="exampleInputFile1">Image</label>
                                                <input type="file" name="img" id="img" onchange="encodeImageFileAsURL(this)">
                                                <p class="help-block">max size 2mb, file format jpg, png, jpeg, bmp.</p>
                                            </div>
                                            <img id="img_modal" width="50%">
                                        <?php
                                        } else {

                                        ?>
                                            <div class="form-group">
                                                <label for="exampleInputFile1">Image</label>
                                            </div>
                                            <div class="form-group">
                                                <img width="50%" src="<?php echo $foto ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile1">Image</label>
                                                <input type="file" name="img" id="img" onchange="encodeImageFileAsURL(this)">
                                                <p class="help-block"> some help text here. </p>
                                            </div>
                                            <img id="img_modal" width="50%">
                                        <?php                                    }
                                    } else {
                                        ?>
                                        <div class="form-group">
                                            <label for="exampleInputFile1">Image</label>
                                        </div>
                                        <div class="form-group">
                                            <img width="50%" src="<?php echo $foto ?>">
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
        window.location.href = "<?php echo base_url() ?>index.php/Unit";
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
<script type="text/javascript">
function encodeImageFileAsURL(element) {
  var file = element.files[0];
  var reader = new FileReader();
  reader.onloadend = function() {
    console.log('RESULT', reader.result)
  	$('#input_image').val(reader.result);
  	$('#img_modal').attr('src', reader.result);
  }
  reader.readAsDataURL(file);
}
</script>