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
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="measurement">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Pengirim </th>
                                    <th> Penerima </th>
                                    <th> Message </th>
                                    <th> Status </th>
                                    <th> Tanggal </th>
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
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
            ],
            "buttons": [
                'pageLength',
                'copy',
                {
                    "extend": 'excel',
                    "messageTop": 'Message',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4]
                    }
                },
                {
                    "extend": 'pdf',
                    "messageTop": 'Message',
                    "messageBottom": null
                },
                {
                    "extend": 'print',
                    "messageTop": 'Message',
                }
            ],


            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('Message/get_data') ?>",
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
            window.location.href = '<?= base_url(); ?>index.php/Message/accept/' + no;
        }
    }
</script>