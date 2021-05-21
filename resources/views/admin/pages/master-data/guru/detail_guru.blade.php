@extends('layouts.master')
@section('title','Detail Guru')
@section('content')

<section class="section">
    <div class="">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title text-center" style="color: black;">Detail Guru | {{ $guru->nama }} </h2>
                <hr>
            </div>
        </div>
        <a href="{{ route('admin-panel.guru.index') }}" class="btn btn-primary btn-lg mb-2">
            <i class="fas fa-arrow-left fa-2x"></i>
        </a>

        <div class="hero">
                <div class="col-md-4 mx-auto rounded-circle bg-white" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
                    <img src="{{ asset('storage/'.$guru->foto) }}" class="card-img-top  rounded-circle img-responsive" alt="Foto {{ $guru->nama }}">
                </div>
        </div>
        <br>
        <div class="col-md-12 bg-white p-2">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><p class="font-weight-bold">Nisn </p></td>
                        <td>:</td>
                        <td> {{ $guru->nip }} </td>
                    </tr>
                    <tr>
                        <td><p class="font-weight-bold">Nama guru </p></td>
                        <td>:</td>
                        <td> {{ $guru->nama }} </td>
                    </tr>
                    <tr>
                        <td><p class="font-weight-bold">Tanggal lahir</p></td>
                        <td>:</td>
                        <td> {{ date('d-m-y', strtotime($guru->tgl_lahir)) }} </td>
                    </tr>
                    <tr>
                        <td><p class="font-weight-bold">No HP</p></td>
                        <td>:</td>
                        <td> {{$guru->no_hp}} </td>
                    </tr>
                    <tr>
                        <td><p class="font-weight-bold">Mata Pelajaran</p></td>
                        <td>:</td>
                        <td> 
                            @foreach($nama_mapel as $pelajaran)
                                {{ $pelajaran->nama_mapel }}
                                <br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td><p class="font-weight-bold">Akun Aktif?</p></td>
                        <td>:</td>
                        <td>
                            @if($guru->is_active == '1')
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

