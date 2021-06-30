<a href="" data-toggle="modal" data-target="#modalPresensi" class="btn btn-outline-primary my-3">
    Isi absen <i class="fas fa-calendar-check"></i> 
</a>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Tgl Presensi</th>
			<th>Status</th>
		</tr>
	</thead>
    <tbody>
        @forelse($absens as $absen)  
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $absen->tanggal_absen }}</td>
            <td>
            @if($absen->keterangan == 'alfa')
                <span class="badge badge-danger">{{ $absen->keterangan }}</span>
            @else
                <span class="badge badge-primary">{{ $absen->keterangan }}</span>
            @endif
            </td>
        </tr>
        @empty
            <tr align="center">
                <td colspan=3>Tidak ada data absen !</td>
            </tr>
        @endforelse
    </tbody>
</table>


