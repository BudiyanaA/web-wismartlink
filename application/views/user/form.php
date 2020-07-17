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
                                    <label> Name</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input class="form-control" name="nama" id="nama" value="<?php echo $nama ?>" <?php echo $disabled ?>>
                                    </div>
                                    <?php echo form_error('nama') ?>
                                </div>
                                <div class="form-group">
                                    <label> Username</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input class="form-control" name="username" id="username" value="<?php echo $username ?>" <?php echo $disabled ?>>
                                    </div>
                                    <?php echo form_error('username') ?>
                                </div>
                                <div class="form-group">
                                    <label> Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input class="form-control" name="email" id="email" value="<?php echo $email ?>" <?php echo $disabled ?>>
                                    </div>
                                    <?php echo form_error('email') ?>
                                </div>
                                <div class="form-group">
                                    <label> Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input class="form-control" name="phone_number" id="phone_number" value="<?php echo $phone_number ?>" <?php echo $disabled ?>>
                                    </div>
                                    <?php echo form_error('phone_number') ?>
                                </div>
                                <?php
                                if ($button == 'Update' || $button == 'Read') {
                                ?>
                                    <div class="form-group">
                                        <label> Status</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <select class="form-control" id="device_type_id" name="status" style="width: 300px" <?php echo $disabled ?>>
                                                <option value="0" <?php
                                                                    if ($status == '0') {
                                                                        echo 'selected';
                                                                    } ?>>Not Active</option>
                                                <option value="1" <?php
                                                                    if ($status == '1') {
                                                                        echo 'selected';
                                                                    } ?>>Active</option>
                                            </select>
                                        </div>
                                        <?php echo form_error('status') ?>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="form-group">
                                    <label> Level User</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <input type="hidden" class="form-control" name="user_id" id="user_id" placeholder="user_id" value="<?php echo $user_id; ?>" <?php echo $disabled ?> />
                                        <?php
                                        if ($button != "Read") {
                                        ?>
                                            <select class="form-control" id="site" name="level" style="width: 300px">
                                                <?php
                                                if ($leveluser_id == null) {
                                                    foreach ($get_level_user->result() as $row) {
                                                        // var_dump($get_site);
                                                ?>
                                                        <option value="<?php echo $row->id ?>"><?php echo $row->role_name ?></option>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $leveluser_id ?>"><?php echo $role_name ?></option>
                                                    <?php
                                                    foreach ($get_level_user->result() as $row) {
                                                    ?>
                                                        <option value="<?php echo $row->id ?>"><?php echo $row->role_name ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        <?php } else { ?>
                                            <input class="form-control" value="<?php echo $role_name ?>" disabled>
                                        <?php } ?>
                                    </div>
                                    <?php echo form_error('leveluser_id') ?>
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