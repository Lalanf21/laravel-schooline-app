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
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Management Siswa</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i>
                    <span>Siswa</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('siswa.index') }}">Data Siswa</a></li>
                </ul>
            </li>
            <li class="menu-header">Management Guru</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-chalkboard-teacher"></i>
                    <span>Guru</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('guru.index') }}">Data Guru</a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="menu-header">Management user</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i>
                    <span>User</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Data User</a>
                    </li>
                    <li><a class="nav-link" href="">Tambah User</a>
                    </li>
                </ul>
            </li>

    </aside>
</div>
