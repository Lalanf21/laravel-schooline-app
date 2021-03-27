@extends('layouts.master')
@section('title','Edit Siswa')

@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Edit Data Siswa</h2>
            <hr>

        </div>
    </div>

    <a href="{{ route('siswa.index') }}" class="btn btn-primary btn-lg mb-2">
        <i class="fas fa-arrow-left fa-2x"></i>
    </a>
    <div id="detail" class="card card-success">
        <div class="card-body">
            <form method="POST" action="{{ route('siswa.update', $siswa->id_siswa) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input id="nisn" type="text" name="nisn" oninput="fill()" value="{{ $siswa->nisn }}" class="form-control @error('nisn') is-invalid @enderror">
                    @error('nisn')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                    <input id="active" type="hidden" class="form-control" name="is_active" value="1">
                </div>

                <div class="form-group">
                    <label for="nama">nama</label>
                    <input id="nama" type="nama" name="nama" value="{{ $siswa->nama }}" class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                    <div class="text-muted">{{ $message }}</div>
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
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror">
                    @if($siswa->kelas === '10')
                        <option value="10" selected>10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    @elseif($siswa->kelas === '11')
                        <option value="11" selected>11</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    @else
                        <option value="12">10</option>
                        <option value="11">11</option>
                        <option value="12" selected>12</option>
                    @endif
                    </select>
                    @error('kelas')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tahun_ajaran">Tahun pelajaran</label>
                    <input id="tahun_ajaran" type="text" value="{{ $siswa->tahun_ajaran }}" class="form-control @error('tahun_ajaran') is-invalid @enderror" name="tahun_ajaran">
                    @error('tahun_ajaran')
                    <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label>Foto</label>
                        <input type="file" name="foto" id="foto" value="{{ old('foto') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('foto')
                        <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label class="custom-switch">
                            <input type="checkbox" name="is_active" class="custom-switch-input" active>
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Aktif ?</span>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <a href="{{ route('siswa.create') }}" class="btn btn-danger btn-lg">
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

