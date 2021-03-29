@extends('layouts.master')
@section('title','Edit Guru')

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

    <a href="{{ route('guru.index') }}" class="btn btn-primary btn-lg mb-2">
        <i class="fas fa-arrow-left fa-2x"></i>
    </a>
    <div id="detail" class="card card-success">
        <div class="card-body">
            <form method="POST" action="{{ route('guru.update',$item->id_guru) }}">
            @method('put')
            @csrf
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input id="nip" type="text" name="nip" oninput="fill()" value="{{ $item->nip }}" class="form-control @error('nip') is-invalid @enderror">

                    @error('nip')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama Guru</label>
                    <input id="nama" type="nama" name="nama" value="{{ $item->nama }}" class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_hp">No Telepon</label>
                    <input id="no_hp" type="text" name="no_hp" value="{{ $item->no_hp }}" class="form-control @error('no_hp') is-invalid @enderror">
                    @error('no_hp')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_mapel">Mata Pelajaran</label>
                    <select name="nama_mapel" id="nama_mapel" class="form-control @error('nama_mapel') is-invalid @enderror">
                        @if($item->nama_mapel === 'b.indonesia')
                        <option value="b.indonesia" selected>b.indonesia</option>
                        <option value="ipa">IPA</option>
                        <option value="ips">IPS</option>
                        @elseif($item->nama_mapel === 'ipa')
                        <option value="b.indonesia">b.indonesia</option>
                        <option value="ipa" selected>IPA</option>
                        <option value="ips">IPS</option>
                        @else
                        <option value="b.indonesia">b.indonesia</option>
                        <option value="ipa">IPA</option>
                        <option value="ips" selected>IPS</option>
                        @endif
                    </select>
                    @error('nama_mapel')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label>Aktif ?</label>
                        <select name="is_active" class="form-control">
                            @if($item->is_active == '1')
                            <option value="1" selected>ya</option>
                            <option value="0">tidak</option>
                            @else
                            <option value="0" selected>tidak</option>
                            <option value="1">ya</option>
                            @endif
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-lg ">
                        <i class="fas fa-edit"></i> Update
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

