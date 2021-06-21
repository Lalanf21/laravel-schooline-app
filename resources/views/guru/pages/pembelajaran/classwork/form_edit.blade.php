@extends('layouts.master')
@section('title','Edit classwork')
@section('content')
@php
    $files = explode("/", $item->file);
    $file = $files['1'];
@endphp
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Edit Classwork</h2>
            <hr>
        </div>
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
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-capitalize">
                <div class="card-body">
                    <form action="{{ route('guru-panel.classwork.update', $item->id_classwork) }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="ruang_belajar">ruang belajar</label>
                            <input type="hidden" name="id_ruang_belajar" value="#">
                            <input type="text" class="form-control" value="{{ $item->ruang_belajar->nama.' - '.$item->ruang_belajar->mapel->nama_mapel }}" readonly>
                            @error('id_ruang_belajar')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis classwork</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="materi" {{ ($item->jenis == 'materi') ? 'selected' : '' }}>Materi</option>
                                <option value="tugas" {{ ($item->jenis == 'tugas') ? 'selected' : '' }}>Tugas</option>

                            </select>
                            @error('jenis')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="judul">judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" value="{{ $item->judul }}">
                            @error('judul')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $item->deskripsi }}</textarea>
                            @error('deskripsi')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deadline">deadline</label>
                            <input type="date" name="deadline" id="deadline" class="form-control" value="{{ $item->deadline }}">
                            @error('deadline')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file">file</label><br>
                            <a href="{{ Storage::url($item->file) }}" download> {{ $file }} </a>
                            <input type="file" name="file" id="file" class="form-control">
                            <div class="text-muted">Upload dokumen format pdf, doc, docx, txt, dan ppt !</div>
                            @error('file')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="is_publish"> Publish ? </label>
                            <select name="is_publish" id="is_publish" class="form-control">
                                <option value="1" {{ ($item->is_publish === '1') ? 'selected' : '' }}> Ya </option>
                                <option value="0" {{ ($item->is_publish === '0') ? 'selected' : '' }}> Tidak </option>

                            </select>
                            @error('is_publish')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <a href="{{ route('guru-panel.classwork.index') }}" class="btn btn-primary"> <i class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-warning"> Edit <i class="fas fa-edit"></i></button>
                    </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-script')

@endpush
