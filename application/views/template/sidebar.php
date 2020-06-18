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
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Teknisi") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Teknisi" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Teknisi</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Fasilitas") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Fasilitas" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Fasilitas</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Generic") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Generic" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Informasi Generic</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Support_staff") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Support_staff" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Support Staff</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Gedung") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Gedung" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Gedung</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Unit") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Unit" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Unit</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Apartemen") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Apartemen" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Apartemen</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Level_user") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Level_user" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Level User</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-bulb"></i> <span class="title">User</span>
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
                </ul>
            </li>
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-globe"></i>
                    <span class="title">Data Penghuni</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Penghuni") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Penghuni" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Penghuni</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Keluarga_penghuni") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Keluarga_penghuni" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Keluarga Penghuni</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-globe"></i>
                    <span class="title">Data Transaksi</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Maintenance") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Maintenance" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Maintenance</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Room_service") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Room_service" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Room Service</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Sewa_fasilitas") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Sewa_fasilitas" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Sewa Fasilitas</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Invoice") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Invoice" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Invoice</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-globe"></i>
                    <span class="title">Toko</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Toko") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Toko" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">List Toko</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Barang_toko") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Barang_toko" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">List Barang Toko</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Barang_toko") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/List_transaksi_toko" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">List Transaksi</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-globe"></i>
                    <span class="title">Restoran</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Restaurant") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/Restaurant" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">List Restoran</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "List_makanan") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/List_makanan" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">List Makanan</span>
                        </a>
                    </li>
                    <li class="nav-item start <?php if ($this->uri->segment(1) == "Barang_toko") {
                                                    echo 'active';
                                                } ?>">
                        <a href="<?php echo base_url() ?>index.php/List_transaksi_resto" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">List Transaksi</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="tooltips <?php if ($this->uri->segment(1) == "Emergency") {
                                    echo 'active';
                                } ?>">
                <a href="<?php echo base_url() ?>index.php/Emergency" class="nav-link ">
                    <i class="icon-bulb"></i>
                    <span class="title">Emergency</span>
                </a>
            </li>

            <li class="tooltips <?php if ($this->uri->segment(1) == "Notifikasi") {
                                    echo 'active';
                                } ?>" data-container="body" data-placement="right" data-html="true" data-original-title="Notifikasi">
                <a href="<?php echo base_url() ?>index.php/Notifikasi">
                    <i class="fa fa-gear"></i>
                    <span class="title">
                        Notifikasi </span>
                </a>
            </li>

            <li class="tooltips <?php if ($this->uri->segment(1) == "Pengumuman") {
                                    echo 'active';
                                } ?>" data-container="body" data-placement="right" data-html="true" data-original-title="Pengumuman">
                <a href="<?php echo base_url() ?>index.php/Pengumuman">
                    <i class="fa fa-gear"></i>
                    <span class="title">
                        Pengumuman </span>
                </a>
            </li>

            <li class="tooltips <?php if ($this->uri->segment(1) == "Tiket") {
                                    echo 'active';
                                } ?>" data-container="body" data-placement="right" data-html="true" data-original-title="Tiket">
                <a href="<?php echo base_url() ?>index.php/Ticket">
                    <i class="fa fa-gear"></i>
                    <span class="title">
                        Tiket </span>
                </a>
            </li>

            <li class="tooltips <?php if ($this->uri->segment(1) == "Ganti_password") {
                                    echo 'active';
                                } ?>" data-container="body" data-placement="right" data-html="true" data-original-title="Ganti Password">
                <a href="<?php echo base_url() ?>index.php/Ganti_password">
                    <i class="fa fa-lock"></i>
                    <span class="title">
                        Ganti Password </span>
                </a>
            </li>



        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>