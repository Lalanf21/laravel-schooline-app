@extends('layouts.master')
@section('title','Add ruang belajar')

@section('content')
<section class="section">
    <div class="">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title" style="color: black;">Tambah ruang belajar</h2>
                <hr>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin-panel.ruang-belajar.store') }}">
                        @csrf
                        <div class="form-group">
                            <select name="id_mapel" class="form-control">
                                <option value="#">-- Pilih Mata pelajaran --</option>
                                @foreach($mapel as $item)
                                <option value="{{ $item->id_mapel }}">
                                    {{ $item->nama_mapel .' kelas '. $item->kelas->nama_kelas}}
                                </option>
                                @endforeach
                            </select>
                            @error('id_mapel')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="id_guru" class="form-control">
                                <option value="#">-- Pilih Guru --</option>
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
                            <label for="nama">Nama ruang belajar</label>
                            <input id="nama" type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <label for="jumlah_pertemuan">T Pertemuan*</label>
                                    <input id="jumlah_pertemuan" type="number" name="jumlah_pertemuan" value="{{ old('jumlah_pertemuan') }}" class="form-control @error('jumlah_pertemuan') is-invalid @enderror">
                                    @error('jumlah_pertemuan')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <label for="kode">kode</label>
                                    <input type="text" name="kode" value="{{ old('kode') }}" class="form-control @error('kode') is-invalid @enderror" readonly>
                                    @error('kode')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 mt-3 p-3">
                                <a id="generate" href="" class="btn btn-primary ">Generate</a>
                            </div>
                            <div class="text-danger mb-3">*) Total pertemuan dalam satu semester </div>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('admin-panel.ruang-belajar.store') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-arrow-left fa-2x"> Kembali</i>
                            </a>
                            <a href="{{ route('admin-panel.ruang-belajar.create') }}" class="btn btn-danger btn-lg">
                                <i class="fas fa-undo"></i> Reset
                            </a>
                            <button type="submit" class="btn btn-success btn-lg ">
                                <i class="fas fa-save"></i> Simpan
                            </button>
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
    $("a#generate").click(function(e){
        e.preventDefault();
        const random = Math.random().toString(36).substr(2, 6)
        $('input[name=kode]').val(random);
    });
</script>
@endpush

