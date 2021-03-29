@extends('layouts.master')
@section('title','Data guru')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management Data guru</h2>
            <hr>
            <a href="{{ route('guru.create') }}" class="btn btn-primary">Tambah Data guru</a>
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
                    <table id="guru" class="table align-items-center table-flush">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama guru</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Akun Aktif</th>
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
        $('#guru').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ @route('list-guru') }}",

            columns: [
                {
                    data: 'DT_RowIndex'
                }, 
                {
                    data: 'nip'
                }, 
                {
                    data: 'nama'
                }, 
                {
                    data: 'no_hp'
                },
                {
                    data: 'nama_mapel'
                },
                {
                    data: 'is_active'
                },
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false
                }
            ]
        });
    });

</script>

@endpush

