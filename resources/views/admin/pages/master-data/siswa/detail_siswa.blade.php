@extends('layouts.master')
@section('title','Detail Siswa')
@section('content')

<section class="section">
    <div class="">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title text-center" style="color: black;">Detail Siswa | {{ $siswa->nama }} </h2>
                <hr>
            </div>
        </div>
        <a href="{{ route('admin-panel.siswa.index') }}" class="btn btn-primary btn-lg mb-2">

            <i class="fas fa-arrow-left fa-2x"></i>
        </a>

        <div class="hero">
                <div class="col-md-4 mx-auto rounded-circle bg-white" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
                    <img src="{{ asset('storage/'.$siswa->foto) }}" class="card-img-top  rounded-circle img-responsive" alt="Foto {{ $siswa->nama }}">
                </div>
        </div>
        <br>
        <div class="col-md-12 bg-white p-2">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><p class="font-weight-bold">Nisn </p></td>
                        <td>:</td>
                        <td> {{ $siswa->nisn }} </td>
                    </tr>
                    <tr>
                        <td><p class="font-weight-bold">Nama Siswa </p></td>
                        <td>:</td>
                        <td> {{ $siswa->nama }} </td>
                    </tr>
                    <tr>
                        <td><p class="font-weight-bold">Tanggal lahir</p></td>
                        <td>:</td>
                        <td> {{ date('d-m-y', strtotime($siswa->tgl_lahir)) }} </td>
                    </tr>
                    <tr>
                        <td><p class="font-weight-bold">Tahun Pelajaran </p></td>
                        <td>:</td>
                        <td> {{$siswa->tahun_ajaran}} </td>
                    </tr>
                    <tr>
                        <td><p class="font-weight-bold">Kelas </p></td>
                        <td>:</td>
                        <td> {{ $siswa->kelas->nama_kelas }} </td>
                    </tr>
                    <tr>
                        <td><p class="font-weight-bold">jurusan </p></td>
                        <td>:</td>
                        <td>{{ $siswa->jurusan->nama_jurusan }}</td>

                    </tr>
                    <tr>
                        <td><p class="font-weight-bold">Akun Aktif?</p></td>
                        <td>:</td>
                        <td>
                            @if($siswa->is_active == '1')
                            <i class="fas fa-check text-success"></i>
                            @else
                            <i class="fas fa-times text-danger"></i>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <p style="font-weight:500px!important;font-size:18px;text-align:justify;" class="text-justify">
            </p>
        </div>
    </div>
</section>


@endsection

@push('after-script')

@endpush

