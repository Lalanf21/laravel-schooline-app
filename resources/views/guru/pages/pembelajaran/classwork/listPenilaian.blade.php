@extends('layouts.master')
@section('title','List Penilaian')
@section('content')
<section class="section">
    <div class="card" style="width:100%;">
        <div class="card-body">
            <h2 class="card-title" style="color: black;">Penilaian Tugas Siswa</h2>
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
            <div class="container bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                <div class="table-responsive">
                    <table id="rb" class="table align-items-center table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Status</th>
                                <th scope="col">File tugas</th>
                                <th scope="col">nilai</th>
                                <th scope="col" rowspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($classworks as $classwork)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $classwork->siswa->nisn }}
                                </td>
                                <td>
                                    {{ $classwork->siswa->nama }}
                                </td>
                                <td>
                                    @if($classwork->deadline == date('Y-m-d'))
                                        <span class="badge badge-danger">Terlambat</span>
                                    @else
                                        <span class="badge badge-success">Tepat waktu</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ Storage::url($classwork->file) }}" download>
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                                <td>
                                    {{ $classwork->nilai }}
                                </td>
                                <td>
                                    <form action="{{ route('guru-panel.penilaian') }}" method="post">
                                        @csrf
                                        <div class="row form-group my-2">
                                            <div class="col-5">
                                                <input type="hidden" name="id_classwork" value="{{ $classwork->id_classwork }}">
                                                <input type="hidden" name="id_siswa" value="{{ $classwork->id_siswa }}">
                                                <input type="number" name="nilai" class="form-control">
                                            </div>
                                            <div class="col-5">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" align="center">
                                    Tidak ada data
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