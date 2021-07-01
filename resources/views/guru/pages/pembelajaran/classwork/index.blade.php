@extends('layouts.master')
@section('title','Classwork')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management Classwork</h2>
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
            <form action="{{ route('guru-panel.tampil-classwork') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="ruang_belajar">ruang belajar</label>
                    <select name="id_ruang_belajar" id="ruang_belajar" class="form-control">
                        @foreach($ruang_belajar as $value)
                        <option value="{{ $value->id_ruang_belajar }}">{{ $value->nama .' - '. $value->mapel->nama_mapel }}</option>
                        @endforeach
                    </select>
                    @error('ruang_belajar')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Proses <i class="fas fa-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@push('after-script')
<script>
    $(function() {
        
        $('#classwork').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ @route('guru-panel.list-classwork') }}",
            dom: 'Bfrtlip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: 
                    {
                        columns: [ 0,1,2,3,4]
                    },
                }, 
                {
                    extend: 'excel',
                    exportOptions: 
                    {
                        columns: [ 0,1,2,3,4]
                    },
                }, 
                {
                    extend: 'pdf',
                    exportOptions: 
                    {
                        columns: [ 0,1,2,3,4]
                    },
                }, 
            ],
            columns: [
                {
                    data: 'DT_RowIndex'
                }, 
                {
                    data: 'ruang_belajar.nama'
                }, 
                {
                    data: 'ruang_belajar.mapel.nama_mapel'
                }, 
                {
                    data: 'ruang_belajar.mapel.kelas.nama_kelas'
                },
                {
                    data: 'judul'
                },
                {
                    data: 'publish'
                },
                {
                    data: 'penilaian'
                },
                {
                    data: 'action'
                    , name: 'action'
                    , orderable: false
                    , searchable: false
                }
            ]
        });
    });

</script>

@endpush