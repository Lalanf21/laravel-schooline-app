@push('before-style')

@endpush

@extends('layouts.master-siswa')
@section('title','Form lihat nilai')
@section('content')
<section class="section">
<div class="section-header">
    <h1>
        Form lihat hasil belajar (Nilai)
    </h1>
</div>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-capitalize">
                <form method="POST" action="{{ route('siswa-panel.proses-nilai') }}">
                    @csrf
                    <div class="form-group">
                        <label>Pilih Ruang belajar</label>
                        <select name="id_ruang_belajar" class="form-control">
                            @foreach($siswa->ruang_belajar as $item)
                            <option value="{{ $item->id_ruang_belajar }}">
                                {{ $item->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Proses <i class="fas fa-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

@push('after-script')


@endpush

