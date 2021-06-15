@push('before-style')

@endpush


@extends('layouts.master-siswa')
@section('title','Ruang Belajar')
@section('content')
<section class="section">
<div class="section-header">
    <h1>PQ0029 - B. Inggris - 10 TKJ</h1>


</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="calendar-tab" data-toggle="tab" href="#presensi" role="tab" aria-controls="calendar" aria-selected="true"><i class="fas fa-calendar"></i> Presensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#classwork" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-newspaper"></i> Classwork</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#teman" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-users"></i> Teman</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="presensi" role="tabpanel" aria-labelledby="home-tab">
                        @include('siswa.pages.presensi')

                    </div>
                    <div class="tab-pane fade show" id="classwork" role="tabpanel" aria-labelledby="home-tab">
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

@endsection

@push('after-script')


@endpush

