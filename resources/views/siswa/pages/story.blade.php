<table class="table table-borderless table-hover">
    <tbody>
    @forelse($works as $work)
        <tr>
            <td>{{ $work->tanggal }}</td>
            <td>
            @if($work->jenis == 'materi')
                <span class="badge badge-success">{{ $work->jenis }}</span>
            @else
                <span class="badge badge-danger">{{ $work->jenis  }}</span>

            @endif
            </td>
            <td>{{ $work->judul }}</td>
            <td>{{ $work->konten }}</td> 
            <td>{{ $work->deskripsi }}</td> 
            <td>
                <a href="{{ route('siswa-panel.detail_classwork', $work->id_classwork) }}">
                    <i class="fas fa-external-link-alt"></i>
                </a>
            </td>
        </tr>
        @empty
        <tr align="center">
            <td colspan="6">
                Belum ada Tugas /  Materi !
            </td>
        </tr>
    @endforelse
    </tbody>
</table>