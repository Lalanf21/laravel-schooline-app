@extends('layouts.master')
@section('title','Data Mata Pelajaran')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management Mata Pelajaran</h2>
            <hr>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
    <a href="{{ route('admin-panel.mapel.index') }}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left"></i> Kembali</a> 
            <div class="container bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
            <div class="card-header">
                <h4>Data mata pelajaran</h4>
            </div>
                <div class="table-responsive">
                    <table id="mapel" class="table table-hover align-items-center table-flush">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Nama mata Pelajaran</th>
                                <th scope="col">Aktif ?</th>
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
        $('#mapel').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ @route('admin-panel.list-mapel') }}"
            , dom: 'Bfrtlip'
            , buttons: [{
                    extend: 'print'
                    , exportOptions: {
                        columns: [0, 1, 2]
                    }
                , }
                , {
                    extend: 'excel'
                    , exportOptions: {
                        columns: [0, 1, 2]
                    }
                , }
                , {
                    extend: 'pdf'
                    , exportOptions: {
                        columns: [0, 1, 2]
                    }
                , }
            , ],

            columns: [{
                    data: 'DT_RowIndex'
                }
                , {
                    data: 'nama_mapel'
                }
                , {
                    data: 'active'
                , }
                , {
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

