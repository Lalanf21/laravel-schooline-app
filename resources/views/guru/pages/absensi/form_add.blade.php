@extends('layouts.master')
@section('title','Tambah absensi')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Buat Absensi</h2>
            <hr>
        </div>
    </div>
    @if (session('status'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-capitalize">
                    <form method="POST" action="{{ route('guru-panel.absensi.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="ruang_belajar">ruang belajar</label>
                        <select name="id_ruang_belajar" id="id_ruang_belajar" class="form-control">
                            @foreach($ruang_belajar as $value)
                            <option value="{{ $value->id_ruang_belajar }}">{{ $value->nama .' - '. $value->mapel->nama_mapel }}</option>
                            @endforeach
                        </select>
                        @error('id_ruang_belajar')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="siswa">Siswa</label>
                        <select name="id_siswa" id="siswa" class="form-control">
                            @foreach($siswa as $value)
                            <option value="{{ $value->id_siswa }}">
                                {{ $value->nama.' - kelas '. $value->kelas->nama_kelas }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_siswa')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    <div class="form-group">
                        <label for="keterangan">keterangan</label>
                        <select name="keterangan" id="keterangan" class="form-control">
                            <option value="hadir">hadir</option>
                            <option value="alfa">Alfa</option>
                            <option value="sakit">sakit</option>
                            <option value="ijin">ijin</option>
                        </select>
                        @error('id_siswa')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_absen">Tanggal</label>
                        <input type="date" name="tanggal_absen" id="tanggal_absen" class="form-control">
                        @error('tanggal_absen')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Buat <i class="fas fa-save"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-script')
@endpush