@extends('templatebn.home')
@section('subjudul','TAG')
@section('content')
	
	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">{{ Session('success') }}</div>
	@endif
	<a href="{{ route('tag.create') }}" class="btn btn-info btn-sm">Tambah Tag</a>
	<br/><br/>
	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Tag</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tag as $t => $result)
			<tr>
				<td>{{ $t + $tag->firstitem() }}</td>
				<td>{{ $result->name }}</td>
				<td>
					<form action="{{ route('tag.destroy', $result->id) }}" method="post">
						@csrf
						@method('delete')
						<a href="{{ route('tag.edit', $result->id) }}" class="btn btn-primary btn-sm">Edit</a>
						<button type="submit" class="btn btn-danger btn-sm">Delate</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $tag->links() }}
@endsection