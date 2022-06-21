@push('before-style')

@endpush
@extends('layouts.master-siswa')
@section('title','Detail classwork')
@section('content')
@php
    $arr = explode('/',$item->file);
    $namaFile = $arr[1];

    $enc = Crypt::encryptString($item->id_classwork);
@endphp
<section class="section">
<div class="section-header text-capitalize">
    <h1>
        {{ $item->jenis }}
    </h1>
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

    @if($item->jenis != 'materi' && !empty($data))
    <div class="col-md-2">
        <div class="card card-success">
            <div class="card-header">
                <strong class="mx-auto">Nilai</strong>
            </div>
            <div class="card-body mx-auto">
            @if( isset($data) )
                <h1>{{ $data->nilai }}</h1>
            @else
                <h1> - </h1>
            @endif
            </div>
        </div>
    </div>
    @else
    <div class="col-md-2"></div>
    @endif
</div>

{{-- form upload --}}
@if(($item->jenis != 'materi') && !isset($data))
<div class="row justify-content-around text-capitalize">
    <div class="col-md-6">
        <div class="card card-dark">
            <div class="card-header">
                <p class="font-weight-bold">Upload Tugas</p>
            </div>
            <div class="card-body">
                <form action="{{ route('siswa-panel.classwork-siswa.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" value="{{ $enc }}" name="id_classwork">
                    <div class="form-group">
                        <label for="file">file</label>
                        <input type="file" name="file" id="file" class="form-control">
                        <div class="text-muted">Upload dokumen format pdf, doc, docx, txt, dan ppt !</div>
                        @error('file')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
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

