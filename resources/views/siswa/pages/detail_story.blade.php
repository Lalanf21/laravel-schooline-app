@push('before-style')

@endpush
@extends('layouts.master-siswa')
@section('title','Detail classwork')
@section('content')
@php
    $arr = explode('/',$item->file);
    $namaFile = $arr[1];
@endphp
<section class="section">
<div class="section-header text-capitalize">
    <h1>
        {{ $item->jenis }}
    </h1>
</div>
<div class="row justify-content-around text-capitalize">
    <div class="col-md-6">
        <div class="card card-dark">
            <div class="card-header">
                <p class="font-weight-bold">Isi {{ $item->jenis }}</p>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-hover">
                    <tr>
                        <td colspan="2"><strong>{{ $item->judul }}</strong></td>
                    </tr>
                    <tr>
                        <td></td> 
                        <td>
                            <strong>Start :</strong> {{ $item->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <td></td> 
                        <td>
                            <strong>Deadline :</strong>{{ $item->deadline }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <strong>{{ $item->deskripsi }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Download : 
                            <a href="{{ Storage::url($item->file) }}" download>
                                {{ $namaFile }}
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    @if($item->jenis == 'tugas')
    <div class="col-md-2">
        <div class="card card-success">
            <div class="card-header">
                <strong class="mx-auto">Nilai</strong>
            </div>
            <div class="card-body mx-auto">
                <h1>100</h1>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-2"></div>
    @endif
</div>

{{-- form upload --}}
@if($item->jenis == 'tugas')
<div class="row justify-content-around text-capitalize">
    <div class="col-md-6">
        <div class="card card-dark">
            <div class="card-header">
                <p class="font-weight-bold">Upload Tugas</p>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <input type="file" class="form-control" name="file" id="file">
                    <button type="submit" class="btn btn-primary mt-4">Upload</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
@endif
{{-- akhir form upload --}}
</section>

@endsection

@push('after-script')


@endpush

