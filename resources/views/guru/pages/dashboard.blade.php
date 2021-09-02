@push('before-style')

@endpush


@extends('layouts.master')
@section('title','dashboard')
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

<div class="row justify-content-md-center">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <a href="{{ route('guru-panel.ruang-belajar.index') }}">
                        <h4>Ruang belajar</h4>
                    </a>
                </div>
                <div class="card-body">
                    {{ $count_rb }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-book-reader"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                </div>
                <div class="card-body">
                    {{-- {{ $siswa }} --}}
                    <a href="{{ route('guru-panel.classwork.index') }}">
                        classwork
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6 center">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <a href="{{ route('guru-panel.absensi.index') }}">
                        <h4>Absensi</h4>
                    </a>
                </div>
                <div class="card-body">
                    {{-- {{ $user }} --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-script')

@endpush


