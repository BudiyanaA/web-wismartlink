<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1><?php echo ucfirst($folder) ?>
                    <small><?php echo $page ?></small>
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
                <span class="active"><?php echo $page ?></span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> <?php echo $page ?></span>
                        </div>
                        <!-- <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                        </div>
                                    </div> -->
                    </div>
                    <div class="portlet-body">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab"> Security </a>
                            </li>
                            <li>
                                <a href="#tab_1_2" data-toggle="tab"> Maintenance </a>
                            </li>
                            <li>
                                <a href="#tab_1_3" data-toggle="tab"> Cleaning </a>
                            </li>
                            <li>
                                <a href="#tab_1_4" data-toggle="tab"> Support Team </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tab_1_1">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase"> Jadwal Security</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url() ?>index.php/Jadwal_kerja/create/security">
                                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover" id="sec_1">
                                            <thead>
                                                <tr>
                                                    <th> Nama </th>
                                                    <th> Shift </th>
                                                    <th> Tanggal Mulai </th>
                                                    <th> Tanggal Akhir </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($jadwal_security as $js) { ?>
                                                    <tr>
                                                        <td> <?php echo $js->nama ?> </td>
                                                        <td> <?php echo $js->shift ?> </td>
                                                        <td> <?php echo $js->start_date ?> </td>
                                                        <td> <?php echo $js->end_date ?> </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a href="<?php echo base_url() ?>index.php/Jadwal_kerja/read/<?php echo $js->id ?>/security">
                                                                            <i class="icon-eye"></i> View </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?php echo base_url() ?>index.php/Jadwal_kerja/update/<?php echo $js->id ?>/security">
                                                                            <i class="icon-pencil"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a onclick="confirmDelete(<?php echo $js->id ?>); return false;">
                                                                            <i class="icon-trash"></i> Delete </a>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_1_2">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase"> Jadwal Maintenance</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url() ?>index.php/Jadwal_kerja/create/mtc">
                                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                        </div>

                                        <table class="table table-striped table-bordered table-hover" id="main_1">
                                            <thead>
                                                <tr>
                                                    <th> Nama </th>
                                                    <th> Shift </th>
                                                    <th> Tanggal Mulai </th>
                                                    <th> Tanggal Akhir </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($jadwal_maintenance as $js) { ?>
                                                    <tr>
                                                        <td> <?php echo $js->nama ?> </td>
                                                        <td> <?php echo $js->shift ?> </td>
                                                        <td> <?php echo $js->start_date ?> </td>
                                                        <td> <?php echo $js->end_date ?> </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a href="<?php echo base_url() ?>index.php/Jadwal_kerja/read/<?php echo $js->id ?>/mtc">
                                                                            <i class="icon-eye"></i> View </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?php echo base_url() ?>index.php/Jadwal_kerja/update/<?php echo $js->id ?>/mtc">
                                                                            <i class="icon-pencil"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a onclick="confirmDelete(<?php echo $js->id ?>); return false;">
                                                                            <i class="icon-trash"></i> Delete </a>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_1_3">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase"> Jadwal Cleaning</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url() ?>index.php/Jadwal_kerja/create/hk">
                                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                        </div>

                                        <table class="table table-striped table-bordered table-hover" id="clean_1">
                                            <thead>
                                                <tr>
                                                    <th> Nama </th>
                                                    <th> Shift </th>
                                                    <th> Tanggal Mulai </th>
                                                    <th> Tanggal Akhir </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($jadwal_cleaning as $js) { ?>
                                                    <tr>
                                                        <td> <?php echo $js->nama ?> </td>
                                                        <td> <?php echo $js->shift ?> </td>
                                                        <td> <?php echo $js->start_date ?> </td>
                                                        <td> <?php echo $js->end_date ?> </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a href="<?php echo base_url() ?>index.php/Jadwal_kerja/read/<?php echo $js->id ?>/hk">
                                                                            <i class="icon-eye"></i> View </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?php echo base_url() ?>index.php/Jadwal_kerja/update/<?php echo $js->id ?>/hk">
                                                                            <i class="icon-pencil"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a onclick="confirmDelete(<?php echo $js->id ?>); return false;">
                                                                            <i class="icon-trash"></i> Delete </a>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_1_4">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase"> Jadwal Support</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url() ?>index.php/Jadwal_kerja/create/it">
                                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                        </div>

                                        <table class="table table-striped table-bordered table-hover" id="sup_1">
                                            <thead>
                                                <tr>
                                                    <th> Nama </th>
                                                    <th> Shift </th>
                                                    <th> Tanggal Mulai </th>
                                                    <th> Tanggal Akhir </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($jadwal_support as $js) { ?>
                                                    <tr>
                                                        <td> <?php echo $js->nama ?> </td>
                                                        <td> <?php echo $js->shift ?> </td>
                                                        <td> <?php echo $js->start_date ?> </td>
                                                        <td> <?php echo $js->end_date ?> </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a href="<?php echo base_url() ?>index.php/Jadwal_kerja/read/<?php echo $js->id ?>/it">
                                                                            <i class="icon-eye"></i> View </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="<?php echo base_url() ?>index.php/Jadwal_kerja/update/<?php echo $js->id ?>/it">
                                                                            <i class="icon-pencil"></i> Edit </a>
                                                                    </li>
                                                                    <li>
                                                                        <a onclick="confirmDelete(<?php echo $js->id ?>); return false;">
                                                                            <i class="icon-trash"></i> Delete </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>

<script>
    $(document).ready(function() {

        //datatables
        $('#sec_1').DataTable({

            "dom": 'Bfrtip',
            "pageLength": 10,
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
            ],
            "buttons": [
                'pageLength',
                'copy',
                {
                    "extend": 'excel',
                    "messageTop": 'User',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3]
                    }
                },
                {
                    "extend": 'pdf',
                    "messageTop": 'User',
                    "messageBottom": null
                },
                {
                    "extend": 'print',
                    "messageTop": 'User',
                }
            ],

            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });

        $('#main_1').DataTable({

            "dom": 'Bfrtip',
            "pageLength": 10,
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
            ],
            "buttons": [
                'pageLength',
                'copy',
                {
                    "extend": 'excel',
                    "messageTop": 'User',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3]
                    }
                },
                {
                    "extend": 'pdf',
                    "messageTop": 'User',
                    "messageBottom": null
                },
                {
                    "extend": 'print',
                    "messageTop": 'User',
                }
            ],

            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });

        $('#clean_1').DataTable({

            "dom": 'Bfrtip',
            "pageLength": 10,
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
            ],
            "buttons": [
                'pageLength',
                'copy',
                {
                    "extend": 'excel',
                    "messageTop": 'User',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3]
                    }
                },
                {
                    "extend": 'pdf',
                    "messageTop": 'User',
                    "messageBottom": null
                },
                {
                    "extend": 'print',
                    "messageTop": 'User',
                }
            ],

            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });

        $('#sup_1').DataTable({

            "dom": 'Bfrtip',
            "pageLength": 10,
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
            ],
            "buttons": [
                'pageLength',
                'copy',
                {
                    "extend": 'excel',
                    "messageTop": 'User',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3]
                    }
                },
                {
                    "extend": 'pdf',
                    "messageTop": 'User',
                    "messageBottom": null
                },
                {
                    "extend": 'print',
                    "messageTop": 'User',
                }
            ],

            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });
    });

    function confirmDelete(no) {
        var choice = confirm('Apakah Anda ingin menghapus data ini ?');
        if (choice === true) {
            window.location.href = '<?= base_url(); ?>index.php/Jadwal_kerja/delete/' + no;
        }
    }
</script>