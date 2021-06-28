@extends('layouts.master')
@section('title','absensi')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
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
            <div class="card">
                <div class="card-body text-capitalize">
                    <form method="POST" action="{{ route('guru-panel.tampil-absensi') }}">
                    @csrf
                    <div class="form-group">
                        <label for="ruang_belajar">pilih ruang belajar</label>
                        <select name="id_ruang_belajar" id="id_ruang_belajar" class="form-control">
                            @foreach($ruang_belajar as $value)
                            <option value="{{ $value->id_ruang_belajar }}">{{ $value->nama .' - '. $value->mapel->nama_mapel }}</option>
                            @endforeach
                        </select>
                        @error('id_ruang_belajar')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                        @error('tanggal')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Proses <i class="fas fa-arrow-right"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-script')
@endpush