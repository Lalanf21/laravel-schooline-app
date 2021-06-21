<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
    @if(Auth()->user()->getRoleNames() == '["siswa"]' || Auth()->user()->getRoleNames() == '["guru"]')
        <li>
            <button data-toggle="modal" data-target="{{ Auth()->user()->getRoleNames() == '["guru"]' ? '#addRuangBelajar' : '#joinRuangBelajar' }}" class="btn btn-outline-primary nav-link">
                <i class="fas fa-plus-square" style="font-size: 30px;"></i>
            </button>    
        </li>
    @endif
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">

                <div class="d-sm-none d-lg-inline-block">{{ Auth()->user()->nama }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin-panel.ubah-password', auth()->user()->id) }}" class="dropdown-item has-icon">
                    <i class="fas fa-key"></i> Ubah password
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class=" dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
{{-- modal join ruang belajar --}}
<div class="modal fade" tabindex="-1" role="dialog" id="joinRuangBelajar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('siswa-panel.addMember') }}" method="post">
                    <input type="text" placeholder="Kode Kelas ..." name="kode" class="form-control">
                    @csrf
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Gabung <i class="fas fa-book"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- akhir modal join ruang belajar --}}

{{-- Modal add ruang belajar --}}
@if(Auth()->user()->getRoleNames() == '["guru"]')
<div class="modal fade" tabindex="-1" role="dialog" id="addRuangBelajar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat ruang belajar</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('guru-panel.ruang-belajar.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                    @if( isset($mapel) )
                        <select name="id_mapel" class="form-control">
                            <option value="#">-- Pilih Mata pelajaran --</option>
                            @foreach($mapel as $item)
                            <option value="{{ $item->mapel->id_mapel }}">
                                {{ $item->mapel->nama_mapel.' kelas '.$item->mapel->kelas->nama_kelas }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_mapel')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    @endif
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama ruang belajar</label>
                        <input id="nama" type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-6 col-md-3">
                            <div class="form-group">
                                <label for="kode">kode</label>
                                <input id="kode" type="text" name="kode" value="{{ old('kode') }}" class="form-control @error('kode') is-invalid @enderror" readonly>
                                @error('kode')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mt-3 p-3">
                            <a id="generate" href="" class="btn btn-outline-primary ">Generate</a>
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Buat <i class="fas fa-store"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
{{-- akhir modal add ruang belajar --}}

<!-- Modal Presensi-->
<div class="modal fade" tabindex="-1" role="dialog" id="modalPresensi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Presensi Kehadiran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="#">
                @csrf
                <div class="form-group">
                    <select class="form-control">
                        <option>Hadir</option>
                        <option>Sakit</option>
                        <option>Ijin</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="file" name="bukti" class="form-control">
                    <i><small class="text-danger">* Upload surat keterangan jika ijin atau sakit</small></i>
                </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="button" class="btn btn-primary">Kirim</button>
        </div>
        </form>
        </div>
    </div>
</div>

{{-- modal upload classwork --}}

{{-- akhir modal upload classwork --}}