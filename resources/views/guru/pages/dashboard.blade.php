@push('before-style')

@endpush


@extends('layouts.master-siswa')
@section('title','home')
@section('content')
<section class="section">
<div class="section-header">
    <h1>Dashboard</h1>
</div>
<div class="row sortable-card">
    <div class="col-12 col-md-6 col-lg-3" style="position: relative; opacity: 1; left: 0px; top: 0px;">
        <div class="card card-success">
            <div class="card-header ui-sortable-handle">
                <h4>PQ0029</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('siswa-panel.ruang_belajar') }}">
                    <p style="color:green">B. Inggris - 10 TKJ</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3" style="position: relative; opacity: 1; left: 0px; top: 0px;">
        <div class="card card-success">
            <div class="card-header ui-sortable-handle">
                <h4>PQ0028</h4>
            </div>
            <div class="card-body">
                <a href="#">
                    <p style="color:green">Sastra - 10 TKJ</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3" style="position: relative; opacity: 1; left: 0px; top: 0px;">
        <div class="card card-success">
            <div class="card-header ui-sortable-handle">
                <h4>PQ0030</h4>
            </div>
            <div class="card-body">
                <a href="#">
                    <p style="color:green">B. Indonesia - 10 TKJ</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3" style="position: relative; opacity: 1; left: 0px; top: 0px;">
        <div class="card card-success">
            <div class="card-header ui-sortable-handle">
                <h4>PQ0089</h4>
            </div>
            <div class="card-body">
                <a href="#">
                    <p style="color:green">Media Informasi - 10 TKJ</p>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-script')


@endpush

