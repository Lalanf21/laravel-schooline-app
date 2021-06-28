@extends('layouts.master')
@section('title','Edit absensi')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Edit Absensi</h2>
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
                    <form method="POST" action="{{ route('guru-panel.absensi.update',$item->id_absensi) }}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <input type="text" readonly value="{{ $item->ruang_belajar->nama }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" readonly value="{{ $item->siswa->nama }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" readonly value="{{ $item->tanggal_absen }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" readonly value="{{ $item->keterangan }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">keterangan</label>
                        <select name="keterangan" id="keterangan" class="form-control">
                            <option value="hadir">hadir</option>
                            <option value="alfa">Alfa</option>
                            <option value="sakit">sakit</option>
                            <option value="ijin">ijin</option>
                        </select>
                        @error('id_siswa')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-warning">Update <i class="fas fa-edit"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-script')
@endpush