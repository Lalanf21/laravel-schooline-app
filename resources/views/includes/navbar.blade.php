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
                <img alt="image" src="{{ asset('storage/'.session()->get('foto')) }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ Auth()->user()->nama }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('ubah-foto', auth()->user()->nisn) }}" class="dropdown-item has-icon">
                    <i class="fas fa-user-edit"></i> Ubah foto
                </a>
                <a href="{{ route('ubah-password', auth()->user()->id) }}" class="dropdown-item has-icon">
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
                        <select name="id_mapel" class="form-control">
                            <option value="#">-- Pilih Mata pelajaran --</option>
                            @foreach(session()->get('mapel') as $item)
                            <option value="{{ $item->mapel->id_mapel }}">
                                {{ $item->mapel->nama_mapel.' kelas '.$item->mapel->kelas->nama_kelas }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_mapel')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                                <label for="jumlah_pertemuan">T Pertemuan*</label>
                                <input id="jumlah_pertemuan" type="number" name="jumlah_pertemuan" value="{{ old('jumlah_pertemuan') }}" class="form-control @error('jumlah_pertemuan') is-invalid @enderror">
                                @error('jumlah_pertemuan')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
                        <div class="text-danger mb-3">*) Total pertemuan dalam satu semester </div>
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
