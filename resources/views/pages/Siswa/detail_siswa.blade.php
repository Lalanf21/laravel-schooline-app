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
        <div class="">
                <div class="col-md-4 mx-auto rounded-circle bg-white p-3" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
                    <img src="{{ asset('storage/'.$siswa->foto) }}" class="card-img-top  rounded-circle img-responsive" alt="...">


                </div>
        </div>
        <br>
        <div class="col-md-12 bg-white p-3" id="detail" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
            
            <table style="width: 100%" class="container text-center">
                <tbody>
                    <tr>
                        <td><span class="font-weight-bold">Nisn :</span></td>
                        <td> {{ $siswa->nisn }} </td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">Nama Siswa :</span></td>
                        <td> {{ $siswa->nama }} </td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">Tanggal lahir :</span></td>
                        <td> {{ date('d-m-y', strtotime($siswa->tgl_lahir)) }} </td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">Tahun Pelajaran :</span></td>
                        <td> {{$siswa->tahun_ajaran}} </td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">Kelas :</span></td>
                        <td> {{ $siswa->kelas }} </td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">Password : </span></td>
                        <td>Terenkripsi</td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">Akun Aktif? :</span></td>
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
            <a href="{{ route('siswa.index') }}" class="btn btn-success btn-block">Kembali</a>
        </div>
    </div>
</section>


@endsection

@push('after-script')

@endpush

