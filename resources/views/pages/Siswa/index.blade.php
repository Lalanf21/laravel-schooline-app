@extends('layouts.master')
@section('title','Siswa')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management Data Siswa</h2>
            <hr>
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Data Siswa</a>
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
                                <th scope="col">Tahun pelajaran</th>
                                <th scope="col">Akun Aktif</th>
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
            , ajax: "{{ @route('list-siswa') }}",

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
                    data: 'is_active'
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

