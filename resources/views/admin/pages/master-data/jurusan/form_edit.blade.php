@extends('layouts.master')
@section('title','Edit jurusan')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management data jurusan</h2>
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
                    <h4>Edit Jurusan</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin-panel.jurusan.update',$item->id_jurusan) }}">
                        @method('put')
                        @csrf
                        <input id="nama_jurusan" type="text" name="nama_jurusan" placeholder="Nama jurusan" value="{{ $item->nama_jurusan }}" class="form-control @error('nama_jurusan') is-invalid @enderror">

                        @error('nama_jurusan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('admin-panel.jurusan.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-warning">Edit <i class="fas fa-arrow-right"></i></button>
                </div>
                    </form>
            </div>

        </div>
        <div class="col-md-7">
            <div class="container bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                <div class="table-responsive">
                    <table id="jurusan" class="table table-hover align-items-center table-flush">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Jurusan</th>
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
        $('#jurusan').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ @route('admin-panel.list-jurusan') }}",


            columns: [
                {
                    data: 'DT_RowIndex'
                }, 
                {
                    data: 'nama_jurusan'
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

