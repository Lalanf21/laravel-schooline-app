@extends('layouts.master')
@section('title','Data Mata Pelajaran')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management Mata Pelajaran </h2>
            <hr>
        </div>
    </div>
    @if (session('status'))
    <div class="row">
        <div class="col-md-7">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin-panel.mapel.store') }}">
                        @csrf
                        <div class="form-group">
                            <input id="nama_mapel" type="text" name="nama_mapel" placeholder="Nama mata pelajaran" autofocus value="{{ old('nama_mapel') }}" class="form-control @error('nama_mapel') is-invalid @enderror">
                            @error('nama_mapel')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="id_kelas" id="kelas" class="form-control">
                                <option value="#">--Pilih Kelas--</option>
                                @foreach($kelas as $item)
                                <option value="{{ $item->id_kelas }}">
                                    {{ $item->nama_kelas }}
                                </option>
                                @endforeach
                            </select>
                            @error('kelas')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="id_guru" class="form-control">
                                <option value="#">--Pilih guru--</option>
                                @foreach($guru as $item)
                                <option value="{{ $item->id_guru }}">
                                    {{ $item->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('id_guru')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">SUBMIT <i class="fas fa-arrow-right"></i></button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4>Lihat daftar mata pelajaran</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin-panel.tampil-mapel') }}">
                        @csrf
                        <div class="form-group">
                            <select name="id_kelas" id="kelas" class="form-control">
                                <option value="#">--Pilih Kelas--</option>
                                @foreach($kelas as $item)
                                <option value="{{ $item->id_kelas }}">
                                    {{ $item->nama_kelas }}
                                </option>
                                @endforeach
                            </select>
                            @error('kelas')
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
    </div>
</section>

@endsection

@push('after-script')
<script>

</script>
@endpush

