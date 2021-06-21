@extends('layouts.master')
@section('title','Edit mata pelajaran guru')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Edit Mata pelajaran guru</h2>
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
                    <h4>Edit data</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin-panel.mapel-guru.update',$item->id) }}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <select name="id_mapel" id="mapel" class="form-control">
                                <option value="#">--Pilih mapel--</option>
                                @foreach($mapel as $value)
                                <option value="{{ $value->id_mapel }}" {{ ($item->id_mapel===$item->id_mapel) ? 'selected' : '' }}>
                                    {{ $value->nama_mapel }}
                                </option>
                                @endforeach
                            </select>
                            @error('id_mapel')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="id_guru" id="guru" class="form-control">
                                <option value="#">--Pilih guru--</option>
                                @foreach($guru as $value)
                                <option value="{{ $value->id_guru }}" {{ ($value->id_guru===$item->id_guru) ? 'selected' : '' }}>
                                    {{ $value->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('id_guru')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                </div>
                <div class="card-footer text-right">
                    <div class="form-group">
                        <a href="{{ route('admin-panel.mapel-guru.index') }}" class="btn btn-danger btn-lg">
                            <i class="fas fa-undo"></i> Reset
                        </a>
                        <button type="submit" class="btn btn-success btn-lg ">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
                </form>
            </div>

        </div>
        <div class="col-md-7">
            <div class="container bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                <div class="table-responsive">
                    <table id="mapelGuru" class="table table-hover align-items-center table-flush">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Nama Guru</th>
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
        $('#mapelGuru').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ route('admin-panel.list-mapel-guru') }}"
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
                    data: 'mapel.nama_mapel'
                }
                , {
                    data: 'guru.nama'
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

