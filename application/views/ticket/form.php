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
                            <input type="text" name="id" id="id" class="form-control" placeholder="Nama" value="<?php echo $id ?>" readonly>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label> Nama</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="<?php echo $nama ?>" readonly> </div>
                            <?php echo form_error('nama') ?>
                        </div>
                        <div class="form-group">
                            <label> Kode Tiket</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" name="kode_tiket" id="kode_tiket" class="form-control" placeholder="kode_tiket" value="<?php echo $kode_tiket ?>" readonly> </div>
                            <?php echo form_error('kode_tiket') ?>
                        </div>
                        <div class="form-group">
                            <label> keterangan</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="keterangan" value="<?php echo $keterangan ?>" readonly> </div>
                            <?php echo form_error('keterangan') ?>
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
                            <label> Status </label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="text" name="status" id="status" class="form-control" placeholder="Status" value="<?php echo $status ?>" readonly> </div>
                            <?php echo form_error('status') ?>
                        </div>

                        <div class="form-group">
                            <label> Nama Staff </label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <?php
                                if ($nama_staff != NULL || $nama_staff != "") {
                                ?>
                                    <input type="text" name="nama_staff" id="nama_staff" class="form-control" placeholder="Nama Staff" value="<?php echo $nama_staff ?>" readonly>
                                <?php
                                } else {
                                ?>
                                    <select name="pic_id" id="pic_id" class="form-control">
                                        <option value=""> - Pilih Role - </option>
                                        <?php
                                        foreach ($get_staff as $row) {
                                        ?>
                                            <option value="<?php echo $row->id ?>"> <?php echo $row->nama_staff ?> </option>

                                        <?php
                                        }
                                        ?>
                                    </select>

                                <?php
                                }
                                ?>
                            </div>

                            <?php echo form_error('nama_staff') ?>
                        </div>

                        <div class="form-actions">
                            <?php
                            if ($nama_staff == NULL || $nama_staff == "") {
                            ?>
                                <button type="submit" class="btn blue">Save Staff</button>
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
        window.location.href = "<?php echo base_url() ?>index.php/Ticket";
    }
</script>