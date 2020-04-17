@extends('templatebn.home')
@section('subjudul','POST')
@section('content')
	
	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">{{ Session('success') }}</div>
	@endif

	<a href="{{ route('post.create') }}" class="btn btn-info btn-sm">Tambah Post</a>
	<br/><br/>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Post</th>
				<th>Kategori</th>
				<th>Daftar Tags</th>
				<th>Creator</th>
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
						<h6><span class="badge badge-info">{{ $tag->name }}</span></h6>
						@endforeach
					</ul>
				</td>
				<td>{{ $result->users->name }}</td>
				<td><img src="{{ asset($result->gambar) }}" class="img-fluid" style="width: 100px;"></td>
				<td>
					<form action="{{ route('post.destroy', $result->id) }}" method="post">
						@csrf
						@method('delete')
						<a href="{{ route('post.edit', $result->id) }}" class="btn btn-primary btn-sm">Edit</a>
						<button type="submit" class="btn btn-danger btn-sm">Delate</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $post->links() }}
@endsection