@extends('layouts.master')
@section('title','Classwork')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management Classwork</h2>
            <hr>
            <a href="" data-toggle="modal" data-target="#uploadClasswork" class="btn btn-primary">Tambah Classwork</a>
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
                    <table id="classwork" class="table text-capitalize align-items-center table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ruang belajar</th>
                                <th scope="col">Mata pelajaran</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">judul</th>
                                <th scope="col">deskripsi</th>
                                <th scope="col">publish ?</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade text-capitalize" tabindex="-1" role="dialog" id="uploadClasswork">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload classwork</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('guru-panel.classwork.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="ruang_belajar">ruang belajar</label>
                        <select name="id_ruang_belajar" id="ruang_belajar" class="form-control">
                        @foreach($ruang_belajar as $value)
                            <option value="{{ $value->id_ruang_belajar }}">{{ $value->nama .' - '. $value->mapel->nama_mapel }}</option>
                        @endforeach
                        </select>
                        @error('ruang_belajar')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis classwork</label>
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="materi">Materi</option>
                            <option value="tugas">Tugas</option>
                        </select>
                        @error('jenis')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="judul">judul</label>
                        <input type="text" name="judul" id="judul" class="form-control">
                        @error('judul')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                        @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deadline">deadline</label>
                        <input type="date" name="deadline" id="deadline" class="form-control">
                        @error('deadline')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="file">file</label>
                        <input type="file" name="file" id="file" class="form-control">
                        <div class="text-muted">Upload dokumen format pdf, doc, docx, txt, dan ppt !</div>
                        @error('file')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-check">
                        <label for="is_publish"> Publish ? </label>
                        <select name="is_publish" id="is_publish" class="form-control">
                            <option value="1"> Ya </option>
                            <option value="0"> Tidak </option>
                        </select>
                        @error('is_publish')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"> Proses <i class="fas fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('after-script')
<script>
    $(function() {
        
        $('#classwork').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ @route('guru-panel.list-classwork') }}",
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
                    data: 'ruang_belajar.nama'
                }, 
                {
                    data: 'ruang_belajar.mapel.nama_mapel'
                }, 
                {
                    data: 'ruang_belajar.mapel.kelas.nama_kelas'
                },
                {
                    data: 'judul'
                },
                {
                    data: 'deskripsi'
                },
                {
                    data: 'publish'
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