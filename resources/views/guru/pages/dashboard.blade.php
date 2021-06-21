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
                    {{ $ruang_belajar }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <a href="">
                        <h4>classwork</h4>
                    </a>
                </div>
                <div class="card-body">
                    {{-- {{ $siswa }} --}}
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6 center">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <a href="{{ route('admin-panel.users.index') }}">
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
<script>
    $("#generate").click(function(e) {
        e.preventDefault();
        const random = Math.random().toString(36).substr(2, 6)
        $('input[name=kode]').val(random);
    });

</script>
@endpush


