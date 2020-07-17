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
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">

                                         <!-- GANTI PASSWORD -->
                                        <?php $data = $this->db->query('select menu.add from menu where id = 9')->row('add'); 
                                            if (in_array($this->session->userdata('level'), explode(',', $data))):
                                        ?>
                                        <a href="<?php echo base_url() ?>index.php/Blog/create">
                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </a>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- <div class="btn-group pull-right">
                                                    <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div> -->
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="measurement">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Date </th>
                                    <th> Title English</th>
                                    <th> Title Bahasa</th>
                                    <th> Pic </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
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
        $('#measurement').DataTable({

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
                    "messageTop": 'Blog',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4]
                    }
                },
                {
                    "extend": 'pdf',
                    "messageTop": 'Blog',
                    "messageBottom": null
                },
                {
                    "extend": 'print',
                    "messageTop": 'Blog',
                }
            ],


            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('Blog/get_data_blog') ?>",
                "type": "POST"
            },


            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });

    });

    function confirmDelete(no) {
        var choice = confirm('Apakah Anda ingin menghapus data ini ?');
        if (choice === true) {
            window.location.href = '<?= base_url(); ?>index.php/Blog/delete/' + no;
        }
    }
</script>