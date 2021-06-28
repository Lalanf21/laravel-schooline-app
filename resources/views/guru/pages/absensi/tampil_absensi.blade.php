@extends('layouts.master')
@section('title','Data absensi siswa')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Data absensi</h2>
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
    <div class="row">
        <div class="col-md-12">
        <a href="{{ route('guru-panel.absensi.index') }}" class="btn btn-primary mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>
            <div class="container bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                <div class="table-responsive">
                    <table id="absensi" class="table table-hover table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal absensi</th>
                                <th scope="col">Nama siswa</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">File surat</th>
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
        $('#absensi').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ @route('guru-panel.list-absensi') }}"
            , dom: 'Bfrtlip'
            , buttons: [{
                    extend: 'print'
                    , exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                , }
                , {
                    extend: 'excel'
                    , exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                , }
                , {
                    extend: 'pdf'
                    , exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                , }
            , ],

            columns: [{
                    data: 'DT_RowIndex'
                }, 
                {
                    data: 'tanggal_absen'
                }, 
                {
                    data: 'siswa.nama'
                }, 
                {
                    data: 'keterangan'
                }, 
                {
                    data: 'open'
                    , orderable: false
                    , searchable: false
                },
                {
                    data: 'edit'
                    , orderable: false
                    , searchable: false
                }
            ]
        });
    });

</script>

@endpush