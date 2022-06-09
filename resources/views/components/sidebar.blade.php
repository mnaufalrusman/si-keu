<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SI-KEUANGAN</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('dashboard') }}"><i
                        class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a></li>

            <li class="menu-header">Transaksi</li>
            <li class="dropdown {{ Request::is('income*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-fw fa-arrow-up"></i>
                    <span>Pendapatan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('income*') ? 'active' : '' }}"><a class="nav-link"
                            href="/income">Data Pendapatan</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Data Sumber Pendapatan</a></li>
                </ul>
            </li>
            <li class="dropdown {{ Request::is('expense*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-fw fa-arrow-down"></i>
                    <span>Pengeluaran</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('expense*') ? 'active' : '' }}"><a class="nav-link"
                            href="/expense">Data Pengeluaran</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Data Sumber Pengeluaran</a></li>
                </ul>
            </li>

            <li class="menu-header">Data Master</li>
            <li class="{{ Request::is('officer*') ? 'active' : '' }}"><a class="nav-link" href="/officer"><i
                        class="fas fa-fw fa-users"></i>
                    <span>Karyawan</span></a></li>
            <li><a class="nav-link" href="blank.html"><i class="fas fa-clipboard"></i><span>Catatan</span></a>
            </li>

            <li class="menu-header">Credits</li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i>
                    <span>Credits</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Logout
            </a>
        </div>
    </aside>
</div>
