@push('before-style')

@endpush

@extends('layouts.master-siswa')
@section('title','Dashboard')
@section('content')
<section class="section">
<div class="section-header">
    <h1>Dashboard</h1>
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

@foreach($siswa as $value)
<div class="row sortable-card">
    @foreach($value->ruang_belajar as $rb)
    <div class="col-12 col-md-6 col-lg-3" style="position: relative; opacity: 1; left: 0px; top: 0px;">
        <div class="card card-success">
            <div class="card-header ui-sortable-handle">
                    <h4>{{ $rb->kode }}</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('siswa-panel.ruang_siswa',$rb->id_ruang_belajar) }}">
                    <p style="color:green">{{ $rb->nama.' - '.$rb->mapel->nama_mapel.' - '. $rb->mapel->kelas->nama_kelas }}</p>

                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endforeach

@endsection

@push('after-script')


@endpush

