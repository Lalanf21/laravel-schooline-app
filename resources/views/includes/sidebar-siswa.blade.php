<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand text-danger">
            <div>
                <a href="" style="font-size: 20px;font-weight:900;font-family: 'Poppins', sans-serif;" class="text-primary text-center"><i style="font-size: 30px;" class="fas fa-graduation-cap"></i> |
                    Schooline</a>
            </div>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">SCHL</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header ">Dashboard</li>
            <li class="nav-item dropdown active">
                <a href="{{ route('siswa-panel.dashboard') }}" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i>
                    <span>Ruang Belajar</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('siswa-panel.ruang_belajar') }}">B. Inggris - 10 TKJ</a>
                    <li><a class="nav-link" href="">Media Informasi - 10 TKJ</a>
                    </li>
                    <li><a class="nav-link" href="">B. Indonesia - 10 TKJ</a>
                    <li><a class="nav-link" href="">Sastra - 10 TKJ</a>
                    </li>

                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-list-alt"></i>
                    <span>Nilai</span></a>
                <ul class="dropdown-menu">
                    <li>
                    <a class="nav-link" href="">Lihat Nilai</a>
                    </li>
                    <li><a class="nav-link" href="">Download nilai</a>
                    </li>
                </ul>
            </li>

    </aside>
</div>
