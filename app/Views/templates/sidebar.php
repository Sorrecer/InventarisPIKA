<script>
    $(document).ready(function() {
        $('li').click(function() {
            $("li.active").removeClass("active");
            $(this).addClass('active');
        });
    })
</script>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="<?php echo base_url('/logo.png'); ?>" style="width:60px;height: 60px">
        </div>
        <div class="sidebar-brand-text mx-3">INVENTARIS<br>SMK PIKA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item  <?php if (session()->id_sidebar == 1) : ?> active <?php endif ?>">
        <a class="nav-link" href="<?php echo base_url('Home'); ?>">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kelola Data
    </div>

    <!-- Barang Masuk -->
    <li class="nav-item <?php if (session()->id_sidebar == 2) : ?> active <?php endif ?>">
        <a class="nav-link" href="<?php echo base_url('barang'); ?>">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Data Barang</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item  <?php if (session()->id_sidebar == 3 || session()->id_sidebar ==  4 || session()->id_sidebar ==  5) : ?> active <?php endif ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-box"></i>
            <span>Kelola Jenis Data</span>
        </a>
        <div id="collapseTwo" class="collapse  <?php if (session()->id_sidebar == 3 || session()->id_sidebar ==  4 || session()->id_sidebar ==  5) : ?> show <?php endif ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Jenis data:</h6>
                <a class="collapse-item  <?php if (session()->id_sidebar == 3) : ?> active <?php endif ?>" href="<?php echo base_url('ruang'); ?>">Nama Ruang</a>
                <a class="collapse-item  <?php if (session()->id_sidebar == 4) : ?> active <?php endif ?>" href="<?php echo base_url('kategori'); ?>">Nama Kategori</a>
                <a class="collapse-item  <?php if (session()->id_sidebar == 5) : ?> active <?php endif ?>" href="<?php echo base_url('jenisBarang'); ?>">Nama Barang</a>
            </div>
        </div>
    </li>

    <!-- Barang Masuk -->
    <li class="nav-item <?php if (session()->id_sidebar == 6) : ?> active <?php endif ?>">
        <a class="nav-link" href="<?php echo base_url('barang-masuk'); ?>">
            <i class="fas fa-fw fa-check"></i>
            <span>Barang Masuk</span></a>
    </li>

    <!-- Barang Keluar -->
    <li class="nav-item <?php if (session()->id_sidebar == 7) : ?> active <?php endif ?>">
        <a class="nav-link" href="<?php echo base_url('barang-keluar'); ?>">
            <i class="fas fa-fw fa-times"></i>
            <span>Barang Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Laporan
    </div>

    <li class="nav-item <?php if (session()->id_sidebar == 8) : ?> active <?php endif ?>">
        <a class="nav-link" href="<?php echo base_url('rekap-data-barang'); ?>">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Rekap Data Barang</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Akun
    </div>

    <li class="nav-item <?php if (session()->id_sidebar == 9) : ?> active <?php endif ?>">
        <a class="nav-link" href="<?php echo base_url('pengaturan-akun'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Pengaturan Akun</span></a>
    </li>

    <?php if (session()->id_level == 1) : ?>

        <li class="nav-item <?php if (session()->id_sidebar == 10) : ?> active <?php endif ?>">
            <a class="nav-link" href="<?php echo base_url('akunstaff'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Akun Staff</span></a>
        </li>
    <?php endif ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>