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
                            <input type="hidden" name="id" id="id" class="form-control" placeholder="Title English" value="<?php echo $id ?>" <?php echo $disabled ?>>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label> Fasilitas</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" name="fasilitas" id="fasilitas" class="form-control" placeholder="Fasilitas" value="<?php echo $fasilitas ?>" <?php echo $disabled ?>> </div>
                            <?php echo form_error('fasilitas') ?>
                        </div>

                        <div class="form-group">
                            <label> Biaya Sewa</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <?php
                                if ($button != "Read") {
                                ?>
                                    <input type="text" name="biaya_sewa" id="biaya_sewa" class="form-control" placeholder="Biaya Sewa" value="<?php echo $biaya_sewa ?>" <?php echo $disabled ?>>
                                <?php
                                } else {
                                ?>
                                    <input type="text" name="biaya_sewa" id="biaya_sewa" class="form-control" placeholder="Biaya Sewa" value="<?php echo 'Rp. ' . number_format($biaya_sewa, 2) ?>" <?php echo $disabled ?>>
                                <?php
                                }
                                ?>
                            </div>
                            <?php echo form_error('biaya_sewa') ?>
                        </div>
                        <?php
                        if ($button != "Read") {
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
                                <img width="50%" src="<?php echo $img ?>">
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
        window.location.href = "<?php echo base_url() ?>index.php/Fasilitas";
    }
</script>