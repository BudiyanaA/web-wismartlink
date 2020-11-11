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
                            <input type="hidden" name="id_apt" id="id_apt" class="form-control" placeholder="Title English" value="<?php echo $id_apt ?>" <?php echo $disabled ?>>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label> Nama Apt</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" name="nama_apt" id="nama_apt" class="form-control" placeholder="nama_apt" value="<?php echo $nama_apt ?>" <?php echo $disabled ?>> </div>
                            <?php echo form_error('nama_apt') ?>
                        </div>
                        <div class="form-group">
                            <label> Kode Apt</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" name="kode_apt" id="kode_apt" class="form-control" placeholder="kode_apt" value="<?php echo $kode_apt ?>" <?php echo $disabled ?>> </div>
                            <?php echo form_error('kode_apt') ?>
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

        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> <?php echo "Apartemen Contact" ?></span>
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" method="post" action="<?php echo base_url() . "index.php/Apartemen/update_contact/" ?>" enctype="multipart/form-data">
                    </div>
                    <div class="form-body">
                        <?php
                            foreach ($contact as $c) {
                        ?>
                            <div class="form-group">
                                <label><?= $c['title'] ?></label>
                                <div class="input-group">
                                    <textarea class="summernote" name=<?= $c['title'] ?>><?= $c['text'] ?></textarea>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
 
                        <div class="form-actions">
                            <button type="submit" class="btn blue"><?php echo $button ?></button>
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
    $(document).ready(function() {
      $('.summernote').summernote();
    });
</script>
<script>
    function back() {
        window.location.href = "<?php echo base_url() ?>index.php/Apartemen";
    }
</script>