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
                            <div class="form-body">
                                <div class="form-group">
                                    <label> Nama</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="hidden" class="form-control" name="id" id="id" placeholder="id" value="<?php echo $id; ?>" <?php echo $disabled ?> />
                                        <input type="hidden" class="form-control" name="level_id" id="level_id" placeholder="id" value="<?php echo $level_id; ?>" <?php echo $disabled ?> />
                                        <?php
                                        if ($button != "Read") {
                                        ?>
                                            <select class="form-control" id="site" name="id_user" style="width: 300px">
                                                <?php
                                                if ($user_id == null) {
                                                    foreach ($get_user as $row) {
                                                        // var_dump($get_site);
                                                ?>
                                                        <option value="<?php echo $row->user_id ?>"><?php echo $row->nama ?></option>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <?php
                                                    foreach ($get_user as $row) {
                                                    ?>
                                                        <option value="<?php echo $row->user_id ?>" <?php if ($user_id == $row->user_id) {
                                                                                                        echo "selected";
                                                                                                    } ?>><?php echo $row->nama ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        <?php } else { ?>
                                            <input class="form-control" value="<?php echo $nama ?>" disabled>
                                        <?php } ?>
                                    </div>
                                    <?php echo form_error('leveluser_id') ?>
                                </div>

                                <div class="form-group">
                                    <label> Shift</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input class="form-control" name="shift" id="shift" value="<?php echo $shift ?>" <?php echo $disabled ?>>
                                    </div>
                                    <?php echo form_error('shift') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Awal dan Akhir</label>
                                    <div class="input-group">
                                        <div class="input-group input-large date-picker input-daterange" data-date="2019/11/10" data-date-format="yyyy-mm-dd">
                                            <input type="text" class="form-control" name="from" value="<?php echo $from ?>" <?php echo $disabled ?>>
                                            <span class="input-group-addon"> s/d </span>
                                            <input type="text" class="form-control" name="to" value="<?php echo $to ?>" <?php echo $disabled ?>> </div>
                                        <!-- /input-group -->
                                        <span class="help-block"> Select date range </span>
                                    </div>
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
        window.location.href = "<?php echo base_url() ?>index.php/User";
    }
</script>