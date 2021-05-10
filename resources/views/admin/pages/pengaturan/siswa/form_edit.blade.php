@extends('layouts.master')
@section('title','Add Siswa')

@section('content')
<section class="section">
    <div class="">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title" style="color: black;">Edit siswa {{ $siswa->nama }}</h2>
                <hr>
            </div>
        </div>
    </div>

    <a href="{{ route('admin-panel.siswa.index') }}" class="btn btn-primary btn-lg mb-2">
        <i class="fas fa-arrow-left fa-2x"></i>
    </a>
    <div id="detail" class="card card-success">
        <div class="card-body">
            <form method="POST" action="{{ route('admin-panel.siswa.update',$siswa->id_siswa) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input id="nisn" type="text" name="nisn" value="{{ $siswa->nisn }}" class="form-control @error('nisn') is-invalid @enderror">
                    @error('nisn')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">nama</label>
                    <input id="nama" type="nama" name="nama" value="{{ $siswa->nama }}" class="form-control @error('nama') is-invalid @enderror">

                    @error('nama')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                <label>Kelas</label>
                    <select name="id_kelas" class="form-control">
                        <option value="#">-- Kelas --</option>
                        @foreach($kelas as $item)
                        <option value="{{ $item->id_kelas }}" {{ ($siswa->id_kelas===$item->id_kelas) ? 'selected' : '' }}>
                            {{ $item->nama_kelas }}
                        </option>
                        @endforeach
                    </select>
                    @error('kelas')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                <label>Jurusan</label>
                    <select name="id_jurusan" class="form-control">
                        <option value="#">--Pilih jurusan--</option>
                        @foreach($jurusan as $item)
                        <option value="{{ $item->id_jurusan }}" {{ ($siswa->id_jurusan===$item->id_jurusan) ? 'selected' : '' }}>
                            {{ $item->nama_jurusan }}
                        </option>
                        @endforeach
                    </select>
                    @error('jurusan')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tgl_lahir">tanggal lahir</label>
                    <input id="tgl_lahir" type="date" name="tgl_lahir" value="{{ $siswa->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">

                    @error('tgl_lahir')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tahun_ajaran">Tahun pelajaran</label>
                    <input id="tahun_ajaran" placeholder="ex: 2020/2021" type="text" value="{{ $siswa->tahun_ajaran }}" class="form-control @error('tahun_ajaran') is-invalid @enderror" name="tahun_ajaran">

                    @error('tahun_ajaran')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label>Foto</label>
                        <img src="{{ url('storage/'.$siswa->foto) }}" alt="{{ $siswa->nama }}" class="img-thumbnail img-responsive" width="150">
                        <input type="file" name="foto" id="foto" value="{{ old('foto') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('foto')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Aktif ?</label>
                    <select name="is_active" id="is_active" class="form-control">
                        <option value="#">Aktif ?</option>
                        <option value="1" {{ ($siswa->is_active == '1') ? 'selected' : '' }}>Ya</option>
                        <option value="0" {{ ($siswa->is_active == '0') ? 'selected' : '' }}>Tidak</option>
                    </select>
                    @error('is_active')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <a href="{{ route('admin-panel.siswa.create') }}" class="btn btn-danger btn-lg">

                        <i class="fas fa-undo"></i> Reset
                    </a>
                    <button type="submit" class="btn btn-success btn-lg ">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>

@endsection

@push('after-script')

@endpush

