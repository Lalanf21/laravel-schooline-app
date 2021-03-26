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
    <div class="row">
        <div class="col-md-12">
            <div class="container bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                <div class="table-responsive">
                    <table id="example" class="table align-items-center table-flush">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">No</th>
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
                                    {{ $value->iteration }}
                                </th>
                                <th>
                                    {{ $value->nisn }}
                                </th>
                                <td>
                                    {{ $value->nama }}
                                </td>
                                <td>
                                    {{ $value->tgl_lahir }}
                                </td>
                                <td>
                                    <i class="fas fa-times"></i>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('siswa.show', $value->id_siswa) }}" class="btn btn-success">Detail</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('siswa.edit',$value->id_siswa) }}" class="btn btn-info">Update</a>
                                    <a href="" class="btn btn-danger remove">Delete</a>
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

