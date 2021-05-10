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
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#classwork" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-newspaper"></i> Classwork</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#teman" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-users"></i> teman</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="classwork" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table table-borderless table-hover">
                            <tbody>
                                <tr>
                                    <td>20 April 2021</td>
                                    <td>Absensi</td>
                                    <td>
                                        <a href="#">
                                            <i class="fas fa-share-square"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>21 April 2021</td>
                                    <td>Materi</td>
                                    <td>
                                        <a href="#">
                                            <i class="fas fa-share-square"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>22 April 2021</td>
                                    <td>Tugas</td>
                                    <td>
                                        <a href="#">
                                            <i class="fas fa-share-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane fade" id="teman" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Mark</td>
                                    <td>38910</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <td>Jacob</td>
                                    <td>3981</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <td>Larry</td>
                                    <td>3920</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('after-script')


@endpush

