@push('before-style')

@endpush


@extends('layouts.master-guru')
@section('title','dashboard')
@section('content')
<section class="section">
<div class="section-header">
    <h1>Dashboard</h1>
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

<div class="row sortable-card">
    @foreach($ruang_belajar as $rb)
    <div class="col-12 col-md-6 col-lg-3" style="position: relative; opacity: 1; left: 0px; top: 0px;">
        <div class="card card-success">
            <div class="card-header ui-sortable-handle">
                <h4>{{ $rb->kode }}</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('siswa-panel.ruang_belajar') }}">
                    <p style="color:green">{{ $rb->nama.' - '.$rb->mapel->nama_mapel }}</p>

                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection

@push('after-script')
<script>
    $("#generate").click(function(e) {
        e.preventDefault();
        const random = Math.random().toString(36).substr(2, 6)
        $('input[name=kode]').val(random);
    });

</script>
@endpush


