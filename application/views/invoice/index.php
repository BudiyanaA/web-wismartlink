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
                            <div class="table-actions-wrapper">
                                <form role="form" method="post" action="<?php echo base_url() . $form_action ?>" enctype="multipart/form-data">

                                    <span> Pilih Tahun </span>
                                    <?php
                                    //get the current year
                                    $Startyear = date('Y');
                                    $endYear = $Startyear - 50;

                                    // set start and end year range i.e the start year
                                    $yearArray = range($Startyear, $endYear);
                                    ?>
                                    <!-- here you displaying the dropdown list -->
                                    <select name="year" id="year" class="table-group-action-input form-control input-inline input-small input-sm">
                                        <?php
                                        foreach ($yearArray as $year) {
                                            // this allows you to select a particular year
                                            $selected = ($year == $Startyear) ? 'selected' : '';
                                            echo '<option ' . $selected . ' value="' . $year . '">' . $year . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <span> Pilih Bulan </span>
                                    <select name="month" id="month" class="table-group-action-input form-control input-inline input-small input-sm">
                                        <option value="">Select...</option>
                                        <?php
                                        $months = array(
                                            1 => 'Januari',
                                            2 => 'Februari',
                                            3 => 'Maret',
                                            4 => 'April',
                                            5 => 'Mei',
                                            6 => 'Juni',
                                            7 => 'Juli',
                                            8 => 'Agustus',
                                            9 => 'September',
                                            10 => 'Oktober',
                                            11 => 'November',
                                            12 => 'Desember'
                                        );
                                        for ($i = 1; $i <= 12; $i++) {
                                            if ($i == $month)
                                                echo '<option selected value="' . $i . '">' . $months[$i] . '</option>';
                                            else
                                                echo '<option value="' . $i . '">' . $months[$i] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <button class="btn btn-sm green table-group-action-submit">
                                        <i class="fa fa-check"></i> Submit</button>
                                </form>
                            </div>

                        </div>
                        <div class="table-toolbar">
                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="<?php echo base_url() ?>index.php/Banner/create">
                                            <button id="sample_editable_1_new" class="btn sbold green"> Generate Tagihan
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div> -->
                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        Pilih Bulan
                                        <a href="<?php echo base_url() ?>index.php/Banner/create">
                                            <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div> -->
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="measurement">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Nomor Invoice </th>
                                    <th> Nama Penghuni </th>
                                    <th> Alamat Apartemen </th>
                                    <th> Bulan </th>
                                    <th> Total </th>
                                    <th> Status </th>
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
                    "messageTop": 'Invoice',
                    "exportOptions": {
                        "columns": [0, 1, 2, 3, 4]
                    }
                },
                {
                    "extend": 'pdf',
                    "messageTop": 'Invoice',
                    "messageBottom": null
                },
                {
                    "extend": 'print',
                    "messageTop": 'Invoice',
                }
            ],


            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('Invoice/get_data') ?>",
                "type": "POST"
            },


            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });

    });

    function confirmDelete(no) {
        var choice = confirm('Apakah Anda ingin mencetak invoice ?');
        if (choice === true) {
            window.location.href = '<?= base_url(); ?>index.php/Invoice/cetak/' + no;
        }
    }
</script>