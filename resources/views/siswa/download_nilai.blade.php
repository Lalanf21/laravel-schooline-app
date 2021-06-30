<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Nilai siswa</title>
</head>
<body>
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                    <table class="table my-3 text-center">
                        <tr class="thead-dark text-uppercase">
                            <th>no</th>
                            <th>Penilaian</th>
                            <th>Bobot</th>
                            <th>nilai</th>
                        </tr>
                        <tr>
                            <td rowspan="2">1</td>
                            <td>Absensi</td>
                            <td rowspan="2">10 %</td>
                            <td rowspan="2">{{ $nilaiAbsen }}</td>
                        </tr>
                        <tr>
                            <td>Kehadiran : {{ $total_absen }} dari {{ $jPertemuan }} Pertemuan </td>
                        <tr>
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
                                @if($jumlah >= 80 && $jumlah <= 100) <strong>A</strong>
                                    @elseif($jumlah >= 70 && $jumlah<= 79) <strong>B</strong>
                                        @elseif($jumlah >= 60 && $jumlah <= 69) <strong class="text-danger">C</strong>
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
</body>
</html>