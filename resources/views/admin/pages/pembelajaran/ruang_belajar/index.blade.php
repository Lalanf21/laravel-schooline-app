@extends('layouts.master')
@section('title','Ruang belajar')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management ruang belajar</h2>
            <hr>
            @if(Auth()->user()->getRoleNames() == '["admin"]')
                <a href="{{ route('admin-panel.ruang-belajar.create') }}" class="btn btn-primary">Tambah ruang belajar</a>
            @endif

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
                    <table id="rb" class="table align-items-center table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ruang belajar</th>
                                <th scope="col">Mata pelajaran</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">T. Pertemuan</th>
                                <th scope="col">Kode Kelas</th>
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
        var cek = '{{ Auth()->user()->getRoleNames() }}';
        if( cek == '[&quot;admin&quot;]' ) {
            var url = '{{ @route('admin-panel.list-ruang-belajar') }}'
        }else{
            var url = '{{ @route('guru-panel.list-ruang-belajar') }}'
        }
        $('#rb').DataTable({
            processing: true
            , serverSide: true
            , ajax: url,
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
                    data: 'nama'
                }, 
                {
                    data: 'mapel.nama_mapel'
                },
                {
                    data: 'mapel.kelas.nama_kelas'
                },
                {
                    data: 'jumlah_pertemuan'
                },
                {
                    data: 'kode'
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