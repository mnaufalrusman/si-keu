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
                    href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a></li>

            <li class="menu-header">Transaksi</li>
            <li class="{{ Request::is('income*') ? 'active' : '' }}"><a class="nav-link" href="/income"><i
                        class="fas fa-fw fa-arrow-up"></i>
                    <span>Pendapatan</span></a></li>

            <li class="{{ Request::is('expense*') ? 'active' : '' }}"><a class="nav-link" href="/expense"><i
                        class="fas fa-fw fa-arrow-down"></i>
                    <span>Pengeluaran</span></a></li>

            <li class="menu-header">employee</li>
            <li class="{{ Request::is('officer*') ? 'active' : '' }}"><a class="nav-link" href="/officer"><i
                        class="fas fa-fw fa-users"></i>
                    <span>Karyawan</span></a></li>

            <li class="menu-header">Credits</li>
            <li><a class="nav-link" href="#"><i class="fas fa-pencil-ruler"></i>
                    <span>Credits</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
