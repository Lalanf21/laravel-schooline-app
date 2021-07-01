@extends('layouts.master')
@section('title','Ubah foto')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Ubah foto</h2>
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
                <div class="card-header">
                    <h4>{{ $item->nama }}</h4>
                </div>
                <div class="card-body">
                @if(Auth()->user()->getRoleNames() == '["guru"]' || '["admin"]')
                    <form method="POST" action="{{ route('proses-ubah-foto',$item->id_guru) }}" enctype="multipart/form-data">
                @else
                    <form method="POST" action="{{ route('proses-ubah-foto',$item->id_siswa) }}" enctype="multipart/form-data">
                @endif
                        @method('put')
                        @csrf
                        <div class="hero">
                            <div class="col-md-4 mx-auto bg-white">
                                <img src="{{ asset('storage/'.$item->foto) }}" class="card-img-top rounded-circle img-responsive" alt="Foto {{ $item->nama }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="file" name="foto" id="foto" class="form-control">
                            @error('foto')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning"><i class="fas fa-user-edit"></i> Ubah foto</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection

@push('after-script')

@endpush
