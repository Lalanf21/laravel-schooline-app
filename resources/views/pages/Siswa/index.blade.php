@extends('layouts.master')
@section('title','Siswa')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Management Data Siswa</h2>
            <hr>
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah
                Data Siswa</a>
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
                    <table id="example" class="table align-items-center table-flush">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Tahun pelajaran</th>
                                <th scope="col">Akun Aktif</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse($siswa as $key => $value)
                            <tr class="text-center">
                                <th scope="row">
                                    {{ $loop->iteration }}
                                </th>
                                <th>
                                    {{ $value->nisn }}
                                </th>
                                <td>
                                    {{ $value->nama }}
                                </td>
                                <td>
                                    {{ $value->tahun_ajaran }}
                                </td>
                                <td>
                                    @if($value->is_active == '1')
                                        <i class="fas fa-check text-success"></i>
                                    @else
                                        <i class="fas fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('siswa.show', $value->id_siswa) }}" class="btn btn-light">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('siswa.edit',$value->id_siswa) }}" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> Update</a>
                                    <form action="{{ route('siswa.destroy', $value->id_siswa) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Anda yakin ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>

                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center p-5 font-weight-bold">
                                    Data tidak tersedia
                                </td>
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

@endpush

