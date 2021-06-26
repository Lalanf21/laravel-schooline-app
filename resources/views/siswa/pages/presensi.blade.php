<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>Tgl Presensi</th>
			<th>Status</th>
		</tr>
	</thead>
    <tbody>
        @foreach($historyAbsens as $history)
        <tr>
            <td>{{ $history->absensi->tanggal_absen }}</td>
            <td>
            @if($history->keterangan == 'alfa')
                <span class="badge badge-danger">{{ $history->keterangan }}</span>
            @else
                <span class="badge badge-success">{{ $history->keterangan }}</span>
            @endif
            </td>
        </tr>
        @endforeach
        @foreach($listAbsens as $absen)  
        <tr>
            <td>{{ $absen->tanggal_absen }}</td>
            <td>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalPresensi">Submit</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
