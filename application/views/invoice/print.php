<link href="<?php echo base_url() ?>assets/pages/css/invoice.min.css" rel="stylesheet" type="text/css" />
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->

        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <!-- END PAGE HEAD-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="invoice">
            <div class="row invoice-logo">
                <div class="col-xs-6 invoice-logo-space">
                    <img src="<?php echo base_url() ?>assets/img/icon/wismart logo 2.png" width="25%" class="img-responsive" alt="" /> </div>
                <div class="col-xs-6">
                    <p> #<?php echo $nomor_invoice ?> / <?php echo date("d M Y") ?>
                        <!-- <span class="muted"> Consectetuer adipiscing elit </span> -->
                    </p>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-xs-4">
                    <h4><b>Kepada:</b></h4>
                    <ul class="list-unstyled">
                        <li> <?php echo $nama_user ?> </li>
                        <li> <?php echo $nama_unit ?>, Lantai <?php echo $lantai ?>, Nomor <?php echo $nomor ?> </li>
                        <li> <?php echo $nama_apartemen ?>, <?php echo $nama_gedung ?> </li>
                        <li> <?php echo $alamat ?></li>
                        <li> <?php echo $kota ?> </li>
                    </ul>
                </div>

            </div>
            <hr />
            <div class="row">
                <div class="col-xs-12">
                    <h4><b>Sewa Apartemen</b></h4>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Item </th>
                                <th> Description </th>
                                <!-- <th class="hidden-xs"> Quantity </th>
                                <th class="hidden-xs"> Unit Cost </th> -->
                                <th> Total </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Biaya sewa apartemen </td>
                                <td> Biaya sewa apartemen per bulan </td>
                                <!-- <td class="hidden-xs"> 32 </td>
                                <td class="hidden-xs"> $75 </td> -->
                                <td> <?php echo 'Rp. ' . number_format($tagihan_apartemen, 2); ?> </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <hr />
            <?php
            if (count($tagihan_maintenance) != 0) {
            ?>
                <h4><b>Maintenance Charge</b></h4>
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Item </th>
                                    <th> Description </th>
                                    <!-- <th class="hidden-xs"> Quantity </th>
                                <th class="hidden-xs"> Unit Cost </th> -->
                                    <th> Total </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($tagihan_maintenance as $tm) {
                                ?>
                                    <tr>
                                        <td> <?php echo $i; ?> </td>
                                        <td> Maintenance </td>
                                        <td> <?php echo $tm->request ?> </td>
                                        <!-- <td class="hidden-xs"> 32 </td>
                                <td class="hidden-xs"> $75 </td> -->
                                        <td> <?php echo 'Rp. ' . number_format($tm->charge, 2) ?> </td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr />

            <?php
            }
            ?>
            <?php
            if (count($tagihan_room_service) != 0) {
            ?>

                <h4><b>Room Service</b></h4>
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Item </th>
                                    <th> Description </th>
                                    <!-- <th class="hidden-xs"> Quantity </th>
                    <th class="hidden-xs"> Unit Cost </th> -->
                                    <th> Total </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($tagihan_room_service as $trs) {
                                ?>
                                    <tr>
                                        <td> 1 </td>
                                        <td> Room Service </td>
                                        <td> <?php echo $trs->request ?> </td>
                                        <!-- <td class="hidden-xs"> 32 </td>
                    <td class="hidden-xs"> $75 </td> -->
                                        <td> <?php echo 'Rp. ' . number_format($trs->charge, 2) ?> </td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <hr />
            <?php
            }
            ?>

            <?php
            if (count($tagihan_sewa_fasilitas) != 0) {
            ?>
                <h4><b>Sewa Fasilitas</b></h4>
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Item </th>
                                    <th> Description </th>
                                    <!-- <th class="hidden-xs"> Quantity </th>
                    <th class="hidden-xs"> Unit Cost </th> -->
                                    <th> Total </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($tagihan_sewa_fasilitas as $trs) {
                                    $get_fasilitas = $this->db->query("select * from fasilitas_gedung where id = '$trs->fasilitas_id'")->row();

                                ?>
                                    <tr>
                                        <td> 1 </td>
                                        <td> Sewa Fasilitas </td>
                                        <td> <?php echo $get_fasilitas->fasilitas ?> </td>
                                        <!-- <td class="hidden-xs"> 32 </td>
                    <td class="hidden-xs"> $75 </td> -->
                                        <td> <?php echo 'Rp. ' . number_format($trs->biaya, 2) ?> </td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            <?php
            }
            ?>

            <div class="row">
                <div class="col-xs-4">
                    <div class="well">
                        <address>
                            <strong>WiSmartLink, Inc.</strong>
                            <br /> 795 Park Ave, Suite 120
                            <br /> San Francisco, CA 94107
                            <br />
                            <abbr title="Phone">P:</abbr> (021) 145-1810 </address>
                    </div>
                </div>
                <div class="col-xs-8 invoice-block">
                    <ul class="list-unstyled amounts">
                        <!-- <li>
                <strong>Sub - Total amount:</strong> $9265 </li>


                <li>
                <strong>Discount:</strong> 12.9% </li>
            <li>
                <strong>VAT:</strong> ----- </li> -->
                        <li>
                            <strong>Grand Total:</strong> <?php echo 'Rp. ' . number_format($grand_total, 2) ?> </li>
                    </ul>
                    <br />
                    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
                        <i class="fa fa-print"></i>
                    </a>
                    <!-- <a class="btn btn-lg green hidden-print margin-bottom-5"> Submit Your Invoice
                        <i class="fa fa-check"></i>
                    </a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>