@extends('layouts.master')
@section('title','Data Siswa')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management Data Siswa</h2>
            <hr>
            <a href="{{ route('admin-panel.siswa.create') }}" class="btn btn-primary">Tambah Data Siswa</a>

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
    <div class="row">
        <div class="col-md-12">
            <div class="container bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                <div class="table-responsive">
                    <table id="siswa" class="table align-items-center table-flush">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>

                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-script')
<script>
    $(function() {
        $('#siswa').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ @route('admin-panel.list-siswa') }}",
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
                    data: 'nisn'
                }, 
                {
                    data: 'nama'
                }, 
                {
                    data: 'tahun_ajaran'
                },
                {
                    data: 'kelas.nama_kelas'
                },
                {
                    data: 'detail',
                    orderable: false,
                    searchable: false
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

