@extends('layouts.master')
@section('title','Siswa')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Kelola Mata Pelajaran</h2>
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
                    <h4>Tambah Mata Pelajaran</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin-panel.mapel.store') }}">
                        @csrf
                    <div class="form-group">
                        <input id="nama_mapel" type="text" name="nama_mapel" placeholder="Nama mata pelajaran" autofocus value="{{ old('nama_mapel') }}" class="form-control @error('nama_mapel') is-invalid @enderror">
                        @error('nama_mapel')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="id_kelas" id="kelas" class="form-control">
                            <option value="#">--Pilih Kelas--</option>
                            @foreach($kelas as $item)
                            <option value="{{ $item->id_kelas }}">
                                {{ $item->nama_kelas }}
                            </option>
                            @endforeach
                        </select>
                        @error('kelas')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="id_guru" class="form-control">
                            <option value="#">--Pilih guru--</option>
                            @foreach($guru as $item)
                            <option value="{{ $item->id_guru }}">
                                {{ $item->nama }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_guru')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="is_active" id="is_active" class="form-control">
                            <option value="#">Aktif ?</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                        @error('is_active')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
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
                    <table id="mapel" class="table table-hover align-items-center table-flush">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Kelas</th>
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
            , ajax: "{{ @route('admin-panel.list-mapel') }}",


            columns: [
                {
                    data: 'DT_RowIndex'
                }, 
                {
                    data: 'nama_mapel'
                },
                {
                    data: 'kelas.nama_kelas'
                },
                {
                    data: 'active',
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
