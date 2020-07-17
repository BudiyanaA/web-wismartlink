<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

            <li class="start <?php if ($this->uri->segment(1) == "Home") {
                                    echo 'active';
                                } ?> ">
                <a href="<?php echo base_url() ?>index.php/Home">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <!-- BEGIN ANGULARJS LINK -->
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-globe"></i>
                    <span class="title">Data Master</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    
                    <!-- TEKNISI -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 1')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Teknisi") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Teknisi" class="nav-link ">
                            <i class="icon-wrench"></i>
                            <span class="title">Teknisi</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <!-- FASILITAS -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 23')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Fasilitas") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Fasilitas" class="nav-link ">
                            <i class="icon-grid"></i>
                            <span class="title">Fasilitas</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- INFORMASI GENERIC -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 10')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Generic") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Generic" class="nav-link ">
                            <i class="icon-info"></i>
                            <span class="title">Informasi Generic</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- SUPPORT STAFF -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 2')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Support_staff") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Support_staff" class="nav-link ">
                            <i class="icon-user-follow"></i>
                            <span class="title">Support Staff</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- GEDUNG -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 3')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Gedung") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Gedung" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Gedung</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <!-- UNIT -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 4')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Unit") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Unit" class="nav-link ">
                            <i class="icon-home"></i>
                            <span class="title">Unit</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- LEVEL USER -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 5')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Level_user") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Level_user" class="nav-link ">
                            <i class="icon-layers"></i>
                            <span class="title">Level User</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- USER -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 6')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-user"></i> <span class="title">User</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item <?php if ($this->uri->segment(1) == "User") {
                                                    echo 'active';
                                                } ?>">
                                <a href="<?php echo base_url() ?>index.php/User" class="nav-link "> List User </a>
                            </li>
                            <li class="nav-item <?php if ($this->uri->segment(1) == "Jadwal_kerja") {
                                                    echo 'active';
                                                } ?>">
                                <a href="<?php echo base_url() ?>index.php/Jadwal_kerja" class="nav-link "> Jadwal Kerja </a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>

                </ul>
            </li>
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-globe"></i>
                    <span class="title">Data Penghuni</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    <!-- PENGHUNI -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 11')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Penghuni") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Penghuni" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Penghuni</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- KELUARGA PENGHUNI -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 12')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Keluarga_penghuni") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Keluarga_penghuni" class="nav-link ">
                            <i class="icon-user-female"></i>
                            <span class="title">Keluarga Penghuni</span>
                        </a>
                    </li>
                    <?php endif; ?>

                </ul>
            </li>

            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-globe"></i>
                    <span class="title">Data Transaksi</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    <!-- MAINTENANCE -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 13')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Maintenance") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Maintenance" class="nav-link ">
                            <i class="icon-equalizer"></i>
                            <span class="title">Maintenance</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- ROOM SERVICE -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 25')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Room_service") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Room_service" class="nav-link ">
                            <i class="icon-basket-loaded"></i>
                            <span class="title">Room Service</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- SEWA FASILITAS -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 24')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Sewa_fasilitas") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Sewa_fasilitas" class="nav-link ">
                            <i class="icon-grid"></i>
                            <span class="title">Sewa Fasilitas</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- INVOICE -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 14')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Invoice") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Invoice" class="nav-link ">
                            <i class="icon-note"></i>
                            <span class="title">Invoice</span>
                        </a>
                    </li>
                    <?php endif; ?>

                </ul>
            </li>

            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-globe"></i>
                    <span class="title">Toko</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    <!-- LIST TOKO -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 15')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Toko") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Toko" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">List Toko</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- LIST BARANG TOKO -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 16')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Barang_toko") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Barang_toko" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">List Barang Toko</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- LIST TRANSAKSI -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 17')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Barang_toko") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/List_transaksi_toko" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">List Transaksi</span>
                        </a>
                    </li>
                    <?php endif; ?>

                </ul>
            </li>

            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-globe"></i>
                    <span class="title">Restoran</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    <!-- LIST RESTORAN -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 19')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Restaurant") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Restaurant" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">List Restoran</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- LIST MAKANAN -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 20')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "List_makanan") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/List_makanan" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">List Makanan</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- LIST TRANSAKSI -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 21')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Barang_toko") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/List_transaksi_resto" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">List Transaksi</span>
                        </a>
                    </li>
                    <?php endif; ?>

                </ul>
            </li>

            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-tag"></i>
                    <span class="title">Payment</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    <!-- TRANSAKSI TOKO -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 18')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Transaksi_toko") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Transaksi_toko" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Transaksi Toko</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- TRANSAKSI RESTORAN -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 22')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Transaksi_resto") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Transaksi_resto" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Transaksi Restoran</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- SEWA FASILITAS -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 24')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Request_fasilitas") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Sewa_fasilitas" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Request Fasilitas</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- ROOM SERVICE -->
                    <?php $data = $this->db->query('select menu.view from menu where id = 25')->row('view'); 
                        if (in_array($this->session->userdata('level'), explode(',', $data))):
                    ?>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Request_service") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Room_service" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Request Room Service</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                </ul>
            </li>

            <!-- SCAN -->
            <?php $data = $this->db->query('select menu.view from menu where id = 32')->row('view'); 
                 if (in_array($this->session->userdata('level'), explode(',', $data))):
            ?>
            <li class="nav-item start <?php if ($this->uri->segment(1) == "Scan") {
                                            echo 'active';
                                        } ?>">
                <a href="<?php echo base_url() ?>index.php/Scan" class="nav-link ">
                    <i class="icon-bulb"></i>
                    <span class="title">Scan</span>
                </a>
            </li>
            <?php endif; ?>

            <!-- UPLOAD -->
            <?php $data = $this->db->query('select menu.view from menu where id = 26')->row('view'); 
                if (in_array($this->session->userdata('level'), explode(',', $data))):
            ?>
            <li class="tooltips <?php if ($this->uri->segment(1) == "Upload") {
                                    echo 'active';
                                } ?>">
                <a href="<?php echo base_url() ?>index.php/Upload" class="nav-link ">
                    <i class="icon-cloud-upload"></i>
                    <span class="title">Upload</span>
                </a>
            </li>
            <?php endif; ?>

            <!-- SECURITY -->
            <?php $data = $this->db->query('select menu.view from menu where id = 27')->row('view'); 
                if (in_array($this->session->userdata('level'), explode(',', $data))):
            ?>
            <li class="tooltips <?php if ($this->uri->segment(1) == "Security") {
                                    echo 'active';
                                } ?>">
                <a href="<?php echo base_url() ?>index.php/Security" class="nav-link ">
                    <i class="icon-shield"></i>
                    <span class="title">Security</span>
                </a>
            </li>
            <?php endif; ?>

            <!-- VOUCHER -->
            <?php $data = $this->db->query('select menu.view from menu where id = 28')->row('view'); 
                if (in_array($this->session->userdata('level'), explode(',', $data))):
            ?>
            <li class="tooltips <?php if ($this->uri->segment(1) == "Voucher") {
                                    echo 'active';
                                } ?>">
                <a href="<?php echo base_url() ?>index.php/Voucher" class="nav-link ">
                    <i class="icon-present"></i>
                    <span class="title">Voucher</span>
                </a>
            </li>
            <?php endif; ?>

            <!-- EMERGENCY -->
            <?php $data = $this->db->query('select menu.view from menu where id = 29')->row('view'); 
                if (in_array($this->session->userdata('level'), explode(',', $data))):
            ?>
            <li class="tooltips <?php if ($this->uri->segment(1) == "Emergency") {
                                    echo 'active';
                                } ?>">
                <a href="<?php echo base_url() ?>index.php/Emergency" class="nav-link ">
                    <i class="icon-bulb"></i>
                    <span class="title">Emergency</span>
                </a>
            </li>
            <?php endif; ?>

            <!-- NOTIFIKASI -->
            <?php $data = $this->db->query('select menu.view from menu where id = 7')->row('view'); 
                if (in_array($this->session->userdata('level'), explode(',', $data))):
            ?>
            <li class="tooltips <?php if ($this->uri->segment(1) == "Notifikasi") {
                                    echo 'active';
                                } ?>" data-container="body" data-placement="right" data-html="true" data-original-title="Notifikasi">
                <a href="<?php echo base_url() ?>index.php/Notifikasi">
                    <i class="fa fa-gear"></i>
                    <span class="title">
                        Notifikasi </span>
                </a>
            </li>
            <?php endif; ?>

            <!-- PENGUMUMAN -->
            <?php $data = $this->db->query('select menu.view from menu where id = 8')->row('view'); 
                if (in_array($this->session->userdata('level'), explode(',', $data))):
            ?>
            <li class="tooltips <?php if ($this->uri->segment(1) == "Pengumuman") {
                                    echo 'active';
                                } ?>" data-container="body" data-placement="right" data-html="true" data-original-title="Pengumuman">
                <a href="<?php echo base_url() ?>index.php/Pengumuman">
                    <i class="fa fa-gear"></i>
                    <span class="title">
                        Pengumuman </span>
                </a>
            </li>
            <?php endif; ?>

            <!-- TIKET -->
            <?php $data = $this->db->query('select menu.view from menu where id = 30')->row('view'); 
                if (in_array($this->session->userdata('level'), explode(',', $data))):
            ?>
            <li class="tooltips <?php if ($this->uri->segment(1) == "Tiket") {
                                    echo 'active';
                                } ?>" data-container="body" data-placement="right" data-html="true" data-original-title="Tiket">
                <a href="<?php echo base_url() ?>index.php/Ticket">
                    <i class="fa fa-gear"></i>
                    <span class="title">
                        Tiket </span>
                </a>
            </li>
            <?php endif; ?>

            <!-- GANTI PASSWORD -->
            <?php $data = $this->db->query('select menu.view from menu where id = 9')->row('view'); 
                if (in_array($this->session->userdata('level'), explode(',', $data))):
            ?>
            <li class="tooltips <?php if ($this->uri->segment(1) == "Ganti_password") {
                                    echo 'active';
                                } ?>" data-container="body" data-placement="right" data-html="true" data-original-title="Ganti Password">
                <a href="<?php echo base_url() ?>index.php/Ganti_password">
                    <i class="fa fa-lock"></i>
                    <span class="title">
                        Ganti Password </span>
                </a>
            </li>
            <?php endif; ?>
            
            <li class="nav-item start <?php if ($this->uri->segment(1) == "Apartemen") {
                                            echo 'active';
                                        } ?>">
                <a href="<?php echo base_url() ?>index.php/Apartemen" class="nav-link ">
                    <i class="fa fa-gear"></i>
                    <span class="title">Pengaturan Apartemen</span>
                </a>
            </li>


        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>