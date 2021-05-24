@extends('layouts.master')
@section('title','Edit  Users')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Ubah sandi</h2>
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
    <a href="{{ route('admin-panel.dashboard') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $item->nama }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin-panel.proses-ubah-password',$item->id) }}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="masukkan password baru" autofocus>

                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Konfirmasi password">


                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Ubah sandi <i class="fas fa-key"></i></button>
                </div>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection

@push('after-script')

@endpush
