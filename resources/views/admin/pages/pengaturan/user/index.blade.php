@extends('layouts.master')
@section('title','Data users')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management users</h2>
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
                    <h4>Tambah Users</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin-panel.users.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Pilih user</label>
                            <select name="nama" class="form-control" id="nama">
                                <option value="#">-- Pilih --</option>
                                @foreach($guru as $item)
                                <option value="{{ $item->nama }}">
                                    {{ $item->nama }}
                                </option>
                                @endforeach
                            </select>

                            @error('nama')
                            <div class="text-muted">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nisn">NIP</label>
                            <input type="text" name="nisn" id="nisn" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" readonly class="form-control">
                            <div class="text-muted">Note : password = nip guru</div>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control">
                                <option value="#">-- Pilih --</option>
                                @foreach($role as $item)
                                <option value="{{ $item->name }}">
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>

                            @error('role')
                            <div class="text-muted">{{ $message }}</div>
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
                    <table id="users" class="table table-hover align-items-center table-flush">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">NISN / NIP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Role</th>
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
        $('#users').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ @route('admin-panel.list-users') }}"
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
                }
                , {
                    data: 'nisn'
                }
                , {
                    data: 'nama'
                }
                , {
                    data: 'roles[].name'
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

    $('#nama').change(function() {
        var nama = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            , url: "/admin-panel/users/" + nama
            , type: "POST"
            , data: {}
            , contentType: false
            , processData: false
            , async: true
            , dataType: 'json'
            , success: function(data) {
                //console.log(data);
                $('input[name=nisn]').val(data.nip);
                $('input[name=password]').val(data.nip);
            }
        });
        //return false;
    });

</script>

@endpush