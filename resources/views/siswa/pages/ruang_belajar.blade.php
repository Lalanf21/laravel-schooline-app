@push('before-style')

@endpush


@extends('layouts.master-siswa')
@section('title','Ruang Belajar')
@section('content')
<section class="section">
<div class="section-header">
    <h1>
        {{ 
            //$ruang_belajar->nama .' - '.
            $ruang_belajar->mapel->nama_mapel .' - kelas '.
            $ruang_belajar->mapel->kelas->nama_kelas 
        }}
    </h1>
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
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body text-capitalize">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#classwork" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-newspaper"></i> Classwork</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="calendar-tab" data-toggle="tab" href="#presensi" role="tab" aria-controls="calendar" aria-selected="true"><i class="fas fa-calendar"></i> Presensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#teman" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-users"></i> Teman</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show" id="presensi" role="tabpanel" aria-labelledby="home-tab">
                        @include('siswa.pages.presensi')

                    </div>
                    <div class="tab-pane fade show active" id="classwork" role="tabpanel" aria-labelledby="home-tab">
                        @include('siswa.pages.story')

                    </div>
                    <div class="tab-pane fade" id="teman" role="tabpanel" aria-labelledby="profile-tab">
                        @include('siswa.pages.friend')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

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
                <form action="{{ route('siswa-panel.absensi-siswa') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <input type="hidden" name="id_ruang_belajar" value={{ $ruang_belajar->id_ruang_belajar }}>
                        <select class="form-control" name="keterangan">
                            <option value="hadir">Hadir</option>
                            <option value="sakit">Sakit</option>
                            <option value="ijin">Ijin</option>
                        </select>
                        @error('keterangan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="file" name="file" class="form-control">
                        <i><small class="text-danger">* Upload surat keterangan jika ijin atau sakit</small></i>
                        @error('file')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- akhir modal presensi --}}
@endsection

@push('after-script')


@endpush

