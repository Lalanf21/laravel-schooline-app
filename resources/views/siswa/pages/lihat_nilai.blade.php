@push('before-style')

@endpush

@extends('layouts.master-siswa')
@section('title','Lihat nilai')
@section('content')
<section class="section">
<div class="section-header">
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
    <a href="{{ route('siswa-panel.nilai.index') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <div class="card-body text-capitalize">
                <center>
                    <legend>
                        <strong> HASIL PENILAIAN AKHIR </strong>
                    </legend>

                    <table>
                        <tr>
                            <td>
                                <strong>NISN</strong>
                            </td>
                            <td>:</td>
                            <td>
                                {{ $siswa->nisn }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Nama Lengkap</strong>
                            </td>
                            <td>:</td>
                            <td>
                                {{ $siswa->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Kelas</strong>
                            </td>
                            <td>:</td>
                            <td>
                                {{ $siswa->kelas->nama_kelas }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Tahun Ajaran</strong>
                            </td>
                            <td>:</td>
                            <td>
                                {{ $siswa->tahun_ajaran }}
                            </td>
                        </tr>
                    </table>
                </center>
                <a href="{{ route('siswa-panel.download-nilai') }}" class="btn btn-success btn-sm mb-2"><i class="fas fa-print"></i> Print</a>
                <table class="table table-hover table-striped my-3 text-center">
                    <tr class="thead-dark text-uppercase">
                        <th>no</th>
                        <th>Penilaian</th>
                        <th>Bobot</th>
                        <th>nilai</th>
                    </tr>
                    <tr>
                        <td rowspan="2">1</td>
                        <td rowspan="2">
                            Absensi <br>
                            (Kehadiran : {{ $total_absen }} dari {{ $jPertemuan }} Pertemuan)
                        </td>
                        <td rowspan="2">10 %</td>
                        <td rowspan="2">{{ $nilaiAbsen }}</td>
                    </tr>
                    <tr>
                    </tr>
                        <td>2</td>
                        <td>tugas</td>
                        <td>20 %</td>
                        <td>{{ $nilaiTugas }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>UTS</td>
                        <td>30 %</td>
                        <td>{{ $nilaiUts }}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>UAS</td>
                        <td>40 %</td>
                        <td>{{ $nilaiUas }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">
                            <strong>Jumlah</strong>
                        </td>
                        <td>
                            <strong>{{ round($jumlah) }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right">
                            <strong>Grade</strong>
                        </td>
                        <td>
                            @if($jumlah >= 80 && $jumlah <= 100)
                                <strong>A</strong>
                            @elseif($jumlah >= 70 && $jumlah<= 79)
                                <strong>B</strong>
                            @elseif($jumlah >= 60 && $jumlah <= 69)
                                <strong class="text-danger">C</strong>
                            @else
                                <strong class="text-danger">D</strong>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

@push('after-script')


@endpush

