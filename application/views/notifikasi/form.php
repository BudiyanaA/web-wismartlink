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
                            <label> Nama Penghuni</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <select name="id_user" id="id_user" class="form-control">
                                    <option value=""> -- Pilih Nama Penghuni -- </option>
                                    <?php
                                    foreach ($get_all_user as $un) {
                                    ?>
                                        <option value="<?php echo $un->user_id ?>" <?php
                                                                                    if ($un->user_id == $id_user) echo 'selected'
                                                                                    ?>> <?php echo $un->nama ?> </option>
                                    <?php } ?>

                                </select>
                            </div>
                            <?php echo form_error('status') ?>
                        </div>


                        <div class="form-group">
                            <label> Title</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="<?php echo $title ?>" <?php echo $disabled ?>> </div>
                            <?php echo form_error('title') ?>
                        </div>
                        <div class="form-group">
                            <label> desc</label>
                            <textarea id="summernote_1" name="desc"><?php echo $desc ?></textarea>
                            <?php echo form_error('desc') ?>
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
        window.location.href = "<?php echo base_url() ?>index.php/Pengumuman";
    }
</script>