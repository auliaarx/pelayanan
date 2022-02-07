<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="index3.html" class="brand-link">
        <img src="<?= base_url() ?>assets/back/dist/img/izin.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text">Pelayanan RT 002</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-2 pb-2 mb-2 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>assets/back/dist/img/admin.ico" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <b><a href="#" class="d-block"><?= $this->session->username; ?></a></b>
                <span class="badge badge-success">
                    <?= $this->session->level_user; ?>
                </span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <?php if (adminis()) { ?>

                    <li class="nav-item has-treeview menu-open">
                        <a href="<?= base_url('dashboard_warga') ?>" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('penduduk') ?>" class="nav-link">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>
                                Data Warga
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('penduduk') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data penduduk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('kartukk') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Kartu Keluarga</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('penduduk') ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Sirkulasi Penduduk
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('datamd') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Meninggal</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('datapendatang') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Pendatang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('datapindah') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Pindah</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-scroll"></i>
                            <p>
                                Surat keterangan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('suketdomisili') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Suket Domisili</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('suketskck') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Suket Kelakuan Baik</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('suketnikah') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Suket Pengantar Nikah</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('suketmendu') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Suket Kematian</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('suketdatang') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Suket Kematian</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('suketpindah') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Suket Pindah</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">MASYARAKAT</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-bell"></i>
                            <p>
                                Status
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('iuranrt') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Iuran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('pengsuratrt') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pengajuan Surat</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">LAINNYA</li>
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('pengguna'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>
                                Pengguna Sistem
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('editberita'); ?>" class="nav-link">
                            <i class="nav-icon far fa-newspaper"></i>
                            <p>
                                Berita
                            </p>
                        </a>
                    </li>

                <?php } else { ?>

                    <li class="nav-item has-treeview menu-open">
                        <a href="<?= base_url('dashboard_warga') ?>" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">MASYARAKAT</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-coins"></i>
                            <p>
                                Pelayanan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('iuranrtw') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pembayaran Iuran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('pengsuratrtw') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pengajuan Surat</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">MY PROFILE</li>
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('penduduk/profilee/' . $this->session->id_user); ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('kartukk/profile/' . $this->session->id_user); ?>" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Edit Profile
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <li class="nav-item has-treeview">
                    <a href="<?= base_url('auth/logout') ?>" class=" nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>