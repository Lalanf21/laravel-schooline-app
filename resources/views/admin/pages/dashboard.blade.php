@extends('admin.layouts.master')
@section('title','home')
@section('content')
<section class="section">
<div class="section-header">
    <h1>Dashboard</h1>
</div>
<div class="row justify-content-md-center">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Siswa</h4>
                </div>
                <div class="card-body">
                    12
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Guru</h4>
                </div>
                <div class="card-body">
                    12
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
                    <h4>User Aktif</h4>
                </div>
                <div class="card-body">
                    123
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-script')

@endpush

