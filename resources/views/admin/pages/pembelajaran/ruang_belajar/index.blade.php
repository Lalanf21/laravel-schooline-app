@extends('layouts.master')
@section('title','Ruang belajar')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management ruang belajar</h2>
            <hr>
            <a href="{{ route('admin-panel.ruang-belajar.create') }}" class="btn btn-primary">Tambah ruang belajar</a>

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
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Ruang belajar</th>
                                <th scope="col">Mata pelajaran</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Guru</th>
                                <th scope="col">Kode Kelas</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                        @forelse($ruang_belajar as $value)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $value->nama }}
                                </td>
                                <td>
                                    {{ $value->mapel->nama_mapel }}
                                </td>
                                <td>
                                    {{ $value->mapel->kelas->nama_kelas }}
                                </td>
                                <td>
                                    {{ $value->mapel->guru->nama }}
                                </td>
                                <td>
                                    {{ $value->kode }}
                                </td>
                                <td>
                                    <a href="{{ route('admin-panel.ruang-belajar.edit',$value->id_ruang_belajar) }}" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Update</a> ||
                                    <form action="{{ route('admin-panel.ruang-belajar.destroy', $value->id_ruang_belajar) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm(\'Anda yakin ?\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Tidak ada data</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-script')
{{-- <script>
    $(function() {
        $('#rb').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ @route('admin-panel.list') }}",
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
                    data: 'mapel.kelas.nama.kelas'
                },
                {
                    data: 'guru[].nama'
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

</script> --}}

@endpush