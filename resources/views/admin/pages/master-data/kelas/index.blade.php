@extends('layouts.master')
@section('title','Data Kelas')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management data Kelas</h2>
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
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Kelas</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin-panel.kelas.store') }}">
                        @csrf
                        <input id="nama_kelas" type="text" name="nama_kelas" placeholder="Nama kelas" autofocus value="{{ old('nama_kelas') }}" class="form-control @error('nama_kelas') is-invalid @enderror">

                        @error('nama_kelas')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">SUBMIT <i class="fas fa-arrow-right"></i></button>
                </div>
                </form>
            </div>

        </div>
        <div class="col-md-7">
            <div class="container bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                <div class="table-responsive">
                    <table id="kelas" class="table table-hover align-items-center table-flush">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">kelas</th>
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
        $('#kelas').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ @route('admin-panel.list-kelas') }}"
            , dom: 'Bfrtlip'
            , buttons: [{
                    extend: 'print'
                    , exportOptions: {
                        columns: [0, 1]
                    }
                , }
                , {
                    extend: 'excel'
                    , exportOptions: {
                        columns: [0, 1]
                    }
                , }
                , {
                    extend: 'pdf'
                    , exportOptions: {
                        columns: [0, 1]
                    }
                , }
            , ],
            columns: [{
                    data: 'DT_RowIndex'
                }
                , {
                    data: 'nama_kelas'
                }
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

