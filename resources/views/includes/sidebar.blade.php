<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand text-danger">
            <div>
                <a href="{{ route('admin-panel.dashboard') }}" style="font-size: 20px;font-weight:900;font-family: 'Poppins', sans-serif;" class="text-primary text-center"><i style="font-size: 30px;" class="fas fa-graduation-cap"></i> |
                    Schooline</a>
            </div>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">SCHL</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header ">Dashboard</li>
            <li class="nav-item dropdown active">
                @if(Auth()->user()->getRoleNames() == '["admin"]')
                <a href="{{ route('admin-panel.dashboard') }}" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
                @else
                <a href="{{ route('guru-panel.guruDashboard') }}" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
                @endif
            </li>

            {{-- sidebar admin --}}
            @if(Auth()->user()->getRoleNames() == '["admin"]')
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i>
                    <span>Master data</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin-panel.siswa.index') }}">Data Siswa</a></li>
                    <li><a class="nav-link" href="{{ route('admin-panel.guru.index') }}">Data Guru</a></li>
                    <li><a class="nav-link" href="{{ route('admin-panel.mapel.index') }}">Data Mata Pelajaran</a></li>
                    <li><a class="nav-link" href="{{ route('admin-panel.mapel-guru.index') }}">Data Mata Pelajaran guru</a></li>
                    <li><a class="nav-link" href="{{ route('admin-panel.kelas.index') }}">Data Kelas</a></li>
                    <li><a class="nav-link" href="{{ route('admin-panel.jurusan.index') }}">Data Jurusan</a></li>

                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i>
                    <span>Pembelajaran</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin-panel.ruang-belajar.index') }}">Ruang Belajar</a>
                    </li>
                    <li><a class="nav-link" href="">Nilai</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i>
                    <span>Pengaturan</span></a>
                <ul class="dropdown-menu">
                    <li>
                    <a class="nav-link" href="{{ route('admin-panel.users.index') }}">Kelola User</a>
                    </li>
                </ul>
            </li>
        {{-- akhir sidebar admin --}}
        @else
        {{-- sidebar guru --}}
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i>
                <span>Pembelajaran</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('guru-panel.ruang-belajar.index') }}">Ruang Belajar</a>

                </li>
                <li><a class="nav-link" href="{{ route('guru-panel.classwork.index') }}">Classwork</a>
                </li>   
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i>
                <span>Absensi</span></a>
            <ul class="dropdown-menu">
                <li>
                    <a class="nav-link" href="{{ route('guru-panel.absensi.index') }}">Lihat absensi
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('guru-panel.absensi.create') }}">Buat absensi siswa
                    </a>
                </li>
            </ul>
        </li>
        {{-- akhir sidebar guru --}}
        @endif

    </aside>
</div>

