@extends('admin.layouts.master')
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
            <form method="POST" action="{{ route('admin-panel.guru.store') }}">
            @csrf
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input id="nip" type="text" name="nip" oninput="fill()" autofocus value="{{ old('nip') }}" class="form-control @error('nip') is-invalid @enderror">
                    @error('nip')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                    <input id="active" type="hidden" class="form-control" name="is_active" value="1">
                </div>

                <div class="form-group">
                    <label for="nama">Nama Guru</label>
                    <input id="nama" type="nama" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_hp">No Telepon</label>
                    <input id="no_hp" type="text" name="no_hp" value="{{ old('name') }}" class="form-control @error('no_hp') is-invalid @enderror">
                    @error('no_hp')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_mapel">Mata Pelajaran</label>
                    <select name="nama_mapel" id="nama_mapel" class="form-control @error('nama_mapel') is-invalid @enderror">
                        <option>--PILIH--</option>
                        <option value="b.indonesia">b.indonesia</option>
                        <option value="ipa">IPA</option>
                        <option value="ips">IPS</option>
                    </select>
                    @error('nama_mapel')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label for="password" class="d-block">Password</label>
                        <input id="password" type="password" value="{{ old('password') }}" class="form-control @error('name') is-invalid @enderror" name="password" readonly>
                    </div>
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
<script>

    function fill(){
        var nip = document.getElementById("nip").value;
        document.getElementById("password").value = nip;
    }



</script>
@endpush

