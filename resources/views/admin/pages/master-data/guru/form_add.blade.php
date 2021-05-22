@extends('layouts.master')
@section('title','Add Guru')

@section('content')
<section class="section">
    <div class="">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title" style="color: black;">Tambah Data guru</h2>
                <hr>
            </div>
        </div>
    </div>

    <a href="{{ route('admin-panel.guru.index') }}" class="btn btn-primary btn-lg mb-2">
        <i class="fas fa-arrow-left fa-2x"></i>
    </a>
    <div id="detail" class="card card-success">
        <div class="card-body">
            <form method="POST" action="{{ route('admin-panel.guru.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input id="nip" type="text" name="nip" autofocus value="{{ old('nip') }}" class="form-control 
                    @error('nip') is-invalid @enderror">
                    @error('nip')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama Guru</label>
                    <input id="nama" type="nama" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror">
                    @error('no_hp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tgl_lahir">tanggal lahir</label>
                    <input id="tgl_lahir" type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                    @error('tgl_lahir')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label>Foto</label>
                        <input type="file" name="foto" id="foto" value="{{ old('foto') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('foto')
                        <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <select name="is_active" id="is_active" class="form-control">
                        <option value="#">Aktif ?</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                    @error('is_active')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <a href="{{ route('admin-panel.guru.create') }}" class="btn btn-danger btn-lg">
                        <i class="fas fa-undo"></i> Reset
                    </a>
                    <button type="submit" class="btn btn-success btn-lg ">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@push('after-script')

@endpush

