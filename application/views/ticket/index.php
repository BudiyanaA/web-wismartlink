<link href="<?php echo base_url() ?>assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url() ?>assets/apps/css/ticket.min.css" rel="stylesheet" type="text/css" />

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
                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="profile-sidebar">
                    <!-- PORTLET MAIN -->
                    <!-- END PORTLET MAIN -->
                    <!-- PORTLET MAIN -->
                    <div class="portlet light bordered">
                        <!-- STAT -->
                        <div class="row list-separated profile-stat">
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="uppercase profile-stat-title"> 37 </div>
                                <div class="uppercase profile-stat-text"> New </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="uppercase profile-stat-title"> 51 </div>
                                <div class="uppercase profile-stat-text"> Processed </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="uppercase profile-stat-title"> 61 </div>
                                <div class="uppercase profile-stat-text"> Completed </div>
                            </div>
                        </div>
                        <!-- END STAT -->
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li class="active">
                                    <a href="<?php echo base_url() ?>index.php/Ticket">
                                        <i class="icon-home"></i> Ticket List </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/Support_staff">
                                        <i class="icon-settings"></i> Support Staff </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END PORTLET MAIN -->
                </div>
                <!-- END BEGIN PROFILE SIDEBAR -->
                <!-- BEGIN TICKET LIST CONTENT -->
                <div class="app-ticket app-ticket-list">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption caption-md">
                                        <i class="icon-globe theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Ticket List</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="measurement">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Ticket Code </th>
                                                <th> Title </th>
                                                <th> Cust. Name </th>
                                                <th> Date </th>
                                                <th> PIC </th>
                                                <th> Assign To </th>
                                                <th> Status </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PROFILE CONTENT -->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>

    <!-- END CONTENT BODY -->
</div>
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Some text in the Modal..</p>
    </div>

</div>
<script>
    $(document).ready(function() {

        //datatables
        $('#measurement').DataTable({

            "dom": 'Bfrtip',
            "pageLength": 10,
            "scrollX": true,
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
            ],
            "buttons": [
                'pageLength',
                'copy',
                {
                    "extend": 'excel',
                    "messageTop": 'Ticket',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4]
                    }
                },
                {
                    "extend": 'pdf',
                    "messageTop": 'Ticket',
                    "messageBottom": null
                },
                {
                    "extend": 'print',
                    "messageTop": 'Ticket',
                }
            ],


            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('Ticket/get_data') ?>",
                "type": "POST"
            },


            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });

    });

    function accept(no) {
        var choice = confirm('Apakah Anda yakin?');
        if (choice === true) {
            window.location.href = '<?= base_url(); ?>index.php/Ticket/accept/' + no;
        }
    }
</script>