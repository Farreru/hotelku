<ul class="pc-navbar">
    <li class="pc-item pc-caption">
        <label>Dashboard</label>
        <i class="ti ti-dashboard"></i>
    </li>
    <li class="pc-item <?php echo $title == "Dashboard" ? 'active' : '' ?>">
        <a href="dashboard/index.html" class="pc-link"><span class="pc-micon"><i class="ti ti-dashboard"></i></span><span
                class="pc-mtext">Default</span></a>
    </li>

    <li class="pc-item pc-caption">
        <label>Menu Utama</label>
        <i class="ti ti-layers-intersect"></i>
    </li>

    <li class="pc-item ">
        <a href="dashboard/index.html" class="pc-link"><span class="pc-micon"><i class="ti ti-layers-intersect"></i></span><span
                class="pc-mtext">Default</span></a>
    </li>
    <li class="pc-item ">
        <a href="dashboard/index.html" class="pc-link"><span class="pc-micon"><i class="ti ti-users"></i></span><span
                class="pc-mtext">Customer</span></a>
    </li>
    <li class="pc-item ">
        <a href="dashboard/index.html" class="pc-link"><span class="pc-micon"><i class="ti ti-bed"></i></span><span
                class="pc-mtext">Kamar</span></a>
    </li>
    <li class="pc-item ">
        <a href="dashboard/index.html" class="pc-link"><span class="pc-micon"><i class="ti ti-notebook"></i></span><span
                class="pc-mtext">Reservasi</span></a>
    </li>
    <li class="pc-item ">
        <a href="dashboard/index.html" class="pc-link"><span class="pc-micon"><i class="ti ti-wallet"></i></span><span
                class="pc-mtext">Metode Pembayaran</span></a>
    </li>

    <li class="pc-item pc-caption">
        <label>Menu Admin</label>
        <i class="ti ti-layers-intersect"></i>
    </li>
    <li class="pc-item <?php echo $title == "Pengguna" ? 'active' : '' ?>">
        <a href="pengguna.php" class="pc-link"><span class="pc-micon"><i class="ti ti-user"></i></span><span
                class="pc-mtext">Pengguna</span></a>
    </li>
    <li class="pc-item <?php echo $title == "Pengaturan" ? 'active' : '' ?>">
        <a href="pengaturan.php" class="pc-link"><span class="pc-micon"><i class="ti ti-settings"></i></span><span
                class="pc-mtext">Pengaturan</span></a>
    </li>

</ul>