<link href="<?php echo base_url() ?>assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url() ?>assets/apps/css/ticket.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>assets/admin/pages/css/todo-2.min.css" rel="stylesheet" type="text/css" />

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
                                <div class="uppercase profile-stat-title"> <?= $new ?> </div>
                                <div class="uppercase profile-stat-text"> New </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="uppercase profile-stat-title"> <?= $processed ?> </div>
                                <div class="uppercase profile-stat-text"> Processed </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="uppercase profile-stat-title"> <?= $completed ?> </div>
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
                <div class="app-ticket app-ticket-details">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="portlet light bordered">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption caption-md">
                                        <i class="icon-globe theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Ticket Details</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="ticket-id bold font-blue"><?php echo $kode_tiket ?></div>
                                            <div class="ticket-title bold uppercase font-blue"><?php echo $keterangan ?></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="ticket-cust">
                                                <span class="bold">Customer:</span> <?php echo $nama ?> (
                                                <a href="mailto:<?php echo $email ?>"><?php echo $email ?>)</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="ticket-date">
                                                <span class="bold">Entry Date/Time:</span> <?php echo $created_date ?> </div>
                                        </div>
                                    </div>
                                    <?php
                                    if ($status == 'New') {
                                    ?>

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="ticket-msg">
                                                    <p><b>
                                                            <i class="icon-note"></i> Customer Message</b></p>
                                                    <p><?php echo $message; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        $get_msg = $this->db->query("select * from ticket_message where ticket_id = '$id'")->result();
                                        $get_file = $this->db->query("select * from ticket_file where ticket_id = '$id' order by created_date DESC")->result();

                                        $color = 'red';
                                        $org = 'red';
                                        
                                        foreach ($get_file as $fl) {
                                            $color = 'blue';
                                            $org = 'File';
                                        ?>
                                            <div class="todo-tasklist-item todo-tasklist-item-border-<?php echo $color ?>">
                                                <div class="todo-tasklist-item-title"> <?php echo $org ?> </div>
                                                <div class="todo-tasklist-item-text"> <a href="<?php echo base_url() . $fl->img ?>">Download File</a> </div>
                                                <div class="todo-tasklist-controls pull-left">
                                                    <span class="todo-tasklist-date">
                                                        <i class="fa fa-calendar"></i> <?php echo $fl->created_date ?> </span>
                                                    <span class="todo-tasklist-badge badge badge-roundless"><?php echo $level ?></span>
                                                </div>
                                            </div>

                                        <?php
                                        }

                                        foreach ($get_msg as $ms) {
                                            if ($ms->sent_by == 'admin') {
                                                $color = 'red';
                                                $org = 'Admin';
                                            } else if ($ms->sent_by == 'staff') {
                                                $color = 'yellow';
                                                $org = $nama_staff . ' (Staff)';
                                            } else {
                                                $color = 'green';
                                                $org = $nama;
                                            }
                                        ?>
                                            <div class="todo-tasklist-item todo-tasklist-item-border-<?php echo $color ?>">
                                                <img class="todo-userpic pull-left" src="<?= $img ?>" width="27px" height="27px">
                                                <div class="todo-tasklist-item-title"> <?php echo $org ?> </div>
                                                <div class="todo-tasklist-item-text"> <?php echo $ms->message ?> </div>
                                                <div class="todo-tasklist-controls pull-left">
                                                    <span class="todo-tasklist-date">
                                                        <i class="fa fa-calendar"></i> <?php echo $ms->created_date ?> </span>
                                                    <span class="todo-tasklist-badge badge badge-roundless"><?php echo $level ?></span>
                                                </div>
                                            </div>

                                        <?php

                                        }
                                        ?>
                                        <!-- <div class="todo-tasklist-item todo-tasklist-item-border-red">
                                            <img class="todo-userpic pull-left" src="../assets/pages/media/users/avatar5.jpg" width="27px" height="27px">
                                            <div class="todo-tasklist-item-title"> Homepage Alignments to adjust </div>
                                            <div class="todo-tasklist-item-text"> Lorem ipsum dolor sit amet, consectetuer dolore dolor sit amet. </div>
                                            <div class="todo-tasklist-controls pull-left">
                                                <span class="todo-tasklist-date">
                                                    <i class="fa fa-calendar"></i> 14 Sep 2014 </span>
                                                <span class="todo-tasklist-badge badge badge-roundless">Important</span>
                                            </div>
                                        </div> -->

                                    <?php
                                    } ?>
                                    <div class="ticket-line"></div>
                                    <form class="form-group" method="post" action="<?php echo base_url() . $form_action ?>">
                                        <!-- <div class="row">
                                            <div class="col-xs-12">
                                                <h3>
                                                    <i class="icon-action-redo"></i> Ticket Reply</h3>
                                                <textarea class="form-control" row="10"></textarea>
                                            </div>
                                        </div> -->
                                        <input type="hidden" name="id" id="id" class="form-control" placeholder="Nama" value="<?php echo $id ?>" readonly>
                                        <?php
                                        if ($pic_id == "" || $pic_id == NULL) {
                                        ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3>
                                                        <i class="icon-user-follow"></i> Assign to</h3>
                                                    <select name="pic_id" id="pic_id" class="form-control">
                                                        <option value="">- Select Staff -</option>
                                                        <?php
                                                        foreach ($get_staff as $st) {
                                                        ?>
                                                            <option value="<?php echo $st->id ?>"><?php echo $st->nama_staff ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                            $get_nama_pic = $this->db->query("select * from support_staff where id = '$pic_id'")->row();
                                        ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h3>
                                                        <i class="icon-user-follow"></i> Assign to</h3>
                                                    <input type="text" class="form-control" value="<?php echo $get_nama_pic->nama_staff ?>" readonly>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>
                                        <br>
                                        <?php
                                        if ($status == 'New') {
                                        ?>
                                            <button class="btn btn-square uppercase bold green" type="submit">Submit</button>

                                        <?php
                                        }
                                        ?>
                                    </form>
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