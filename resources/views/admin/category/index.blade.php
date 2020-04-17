@extends('templatebn.home')
@section('subjudul','KATEGORI')
@section('content')
	
	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">{{ Session('success') }}</div>
	@endif
	<a href="{{ route('category.create') }}" class="btn btn-info btn-sm">Tambah Kategori</a>
	<br/><br/>
	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kategori</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($category as $c => $result)
			<tr>
				<td>{{ $c + $category->firstitem() }}</td>
				<td>{{ $result->name }}</td>
				<td>
					<form action="{{ route('category.destroy', $result->id) }}" method="post">
						@csrf
						@method('delete')
						<a href="{{ route('category.edit', $result->id) }}" class="btn btn-primary btn-sm">Edit</a>
						<button type="submit" class="btn btn-danger btn-sm">Delate</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $category->links() }}
@endsection