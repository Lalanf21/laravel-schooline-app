<table class="table table-hover">
    <tbody>
    	@foreach($friends as $friend)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
            	<li class="media">
	                <img alt="image" class="mr-3 rounded-circle" width="50" src="{{asset('storage/'.$friend->siswa->foto)}}">
	                <div class="media-body">
	                  <div class="mt-0 mb-1 font-weight-bold">{{ucfirst($friend->siswa->nama)}}</div>
	                  <div class="text-success text-small font-600-bold">{{$friend->siswa->nisn}}</div>
	                </div>
	              </li>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>