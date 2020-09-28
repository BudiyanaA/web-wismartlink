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
                <a href="<?php echo base_url() ?>index.php/Home">Home</a>
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
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <!-- <a href="<?php echo base_url() ?>index.php/Banner/create">
                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </a> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title" >Custom Filter : </h3>
                            </div>
                            <div class="panel-body">
                                <form id="form-filter" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="FirstName" class="col-sm-2 control-label">Tanggal Mulai</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="startDate" id="startDate">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="LastName" class="col-sm-2 control-label">Tanggal Selesai</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="endDate" id="endDate">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="LastName" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-4">
                                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="measurement">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Info </th>
                                    <th> Tanggal </th>
                                    <th> Jam </th>
                                    <th> Nama User </th>
                                    <th> No HP</th>
                                    <th> Role </th>
                                    <th> Nama Unit </th>
                                    <th> Nama Gedung </th>
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
    var table;
    
    $(document).ready(function() {

        //datatables
        table = $('#measurement').DataTable({

            "dom": 'Bfrtip',
            "pageLength": 10,
            // "scrollX": true,
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
            ],
            "buttons": [
                'pageLength',
                'copy',
                {
                    "extend": 'excel',
                    "messageTop": 'Restaurant',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    "extend": 'csv',
                    "messageTop": 'Restaurant',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    "extend": 'pdf',
                    "messageTop": 'Restaurant',
                    "messageBottom": null
                },
                {
                    "extend": 'print',
                    "messageTop": 'Restaurant',
                }
            ],

            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('Scan/get_data') ?>",
                "type": "POST",
                "data": function ( data ) {
                    data.startDate = $('#startDate').val();
                    data.endDate = $('#endDate').val();
                }
            },


            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });

    });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });

    function approve(no) {
        var choice = confirm('Approve Restaurant ini ?');
        if (choice === true) {
            window.location.href = '<?= base_url(); ?>index.php/Restaurant/approve/' + no;
        }
    }
</script>