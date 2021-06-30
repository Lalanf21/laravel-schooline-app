@extends('layouts.master')
@section('title','Edit ruang belajar')

@section('content')
<section class="section">
    <div class="">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title" style="color: black;">Edit ruang belajar</h2>
                <hr>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-body">
                @if (Auth()->user()->getRoleNames() == '["admin"]')
                    <form method="POST" action="{{ route('admin-panel.ruang-belajar.update',$item->id_ruang_belajar) }}">
                @else
                    <form method="POST" action="{{ route('guru-panel.ruang-belajar.update',$item->id_ruang_belajar) }}">
                @endif
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label>Mata pelajaran</label>
                            <input type="text" readonly value="{{ $item->mapel->nama_mapel }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Guru</label>
                            <input type="text" readonly value="{{ $item->guru->nama }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama ruang belajar</label>
                            <input id="nama" type="text" name="nama" value="{{ $item->nama }}" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <label for="jumlah_pertemuan">T Pertemuan*</label>
                                    <input id="jumlah_pertemuan" type="number" name="jumlah_pertemuan" value="{{ $item->jumlah_pertemuan }}" class="form-control @error('jumlah_pertemuan') is-invalid @enderror">
                                    @error('jumlah_pertemuan')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="kode">kode</label>
                                    <input id="kode" type="text" name="kode" value="{{ $item->kode }}" class="form-control @error('kode') is-invalid @enderror" readonly>
                                    @error('kode')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-danger mb-3">*) Total pertemuan dalam satu semester </div>
                        </div>

                        <div class="form-group">
                        @if (Auth()->user()->getRoleNames() == '["admin"]')
                            <a href="{{ route('admin-panel.ruang-belajar.store') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-arrow-left fa-2x"></i> Kembali
                            </a>
                        @else
                            <a href="{{ route('guru-panel.ruang-belajar.store') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-arrow-left fa-2x"></i> Kembali
                            </a>
                        @endif
                            <button type="submit" class="btn btn-warning btn-lg ">
                                <i class="fas fa-edit"></i> Edit
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
    $("#generate").click(function(e){
        e.preventDefault();
        const random = Math.random().toString(36).substr(2, 6)
        $('input[name=kode]').val(random);
    });
</script>
@endpush

