@extends('layouts.master')
@section('title','Add Siswa')

@section('content')
<section class="section">
    <div class="">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title" style="color: black;">Tambah Data Siswa</h2>
                <hr>

            </div>
        </div>
    </div>

    <div id="detail" class="card card-success">
        <div class="card-body">
            <form method="POST" action="{{ route('siswa.store') }}">
                <div id="" class="form-group">
                    <label for="nip">NISN</label>
                    <input id="nip" type="text" class="form-control" name="nisn">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama">nama</label>
                    <input id="nama" type="nama" class="form-control" name="nama">
                </div>

                <div class="form-group">
                    <label for="tgl_lahir">tanggal lahir</label>
                    <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir">
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" class="form-control">
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tahun_pelajaran">Tahun pelajaran</label>
                    <input id="tahun_pelajaran" type="text" class="form-control" name="tahun_pelajaran">
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label>Foto</label>
                        <input type="file" name="foto_siswa" id="foto_siswa" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="password" class="d-block">Password</label>
                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                    </div>
                    <div class="form-group col-6">
                        <label for="password2" class="d-block">Konfirmasi Password</label>
                        <input id="password2" type="password" class="form-control" name="password2">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
                <div>
                    <a href="{{ route('siswa.index') }}" class="btn btn-primary btn-lg btn-block">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
</section>

@endsection

@push('after-script')

@endpush

