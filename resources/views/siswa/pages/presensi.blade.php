<a href="" data-toggle="modal" data-target="#modalPresensi" class="btn btn-outline-primary my-3">
    <i class="fas fa-list"></i>
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
        @foreach($absens as $absen)  
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $absen->tanggal_absen }}</td>
            <td>
                <span class="badge badge-success">{{ $absen->keterangan }}</span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


