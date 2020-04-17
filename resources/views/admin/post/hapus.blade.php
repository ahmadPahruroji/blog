@extends('templatebn.home')
@section('subjudul','POST RESTORE')
@section('content')
	
	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">{{ Session('success') }}</div>
	@endif

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Post</th>
				<th>Kategori</th>
				<th>Daftar Tags</th>
				<th>Thumbnail</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($post as $p => $result)
			<tr>
				<td>{{ $p + $post->firstitem() }}</td>
				<td>{{ $result->judul }}</td>
				<td>{{ $result->category->name }}</td>
				<td>
					<ul>
						@foreach($result->tags as $tag)
						<li>{{ $tag->name }}</li>
						@endforeach
					</ul>
				</td>
				<td><img src="{{ asset($result->gambar) }}" class="img-fluid" style="width: 100px;"></td>
				<td>
					<form action="{{ route('post.hapus', $result->id) }}" method="post">
						@csrf
						@method('delete')
						<a href="{{ route('post.restore', $result->id) }}" class="btn btn-info btn-sm">Restore</a>
						<button type="submit" class="btn btn-danger btn-sm">Delate</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $post->links() }}
@endsection