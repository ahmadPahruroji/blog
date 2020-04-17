@extends('templatebn.home')
@section('subjudul','Pengguna')
@section('content')
	
	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">{{ Session('success') }}</div>
	@endif
	<a href="{{ route('user.create') }}" class="btn btn-info btn-sm">Tambah User</a>
	<br/><br/>
	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama User</th>
				<th>Email</th>
				<th>Type</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($user as $u => $result)
			<tr>
				<td>{{ $u + $user->firstitem() }}</td>
				<td>{{ $result->name }}</td>
				<td>{{ $result->email }}</td>
				<td>
					@if($result->type)
					<h6><span class="badge badge-info">Administrator</span></h6>
					@else
					<h6><span class="badge badge-warning">Penulis</span></h6>
					@endif
				</td>
				<td>
					<form action="{{ route('user.destroy', $result->id) }}" method="post">
						@csrf
						@method('delete')
						<a href="{{ route('user.edit', $result->id) }}" class="btn btn-primary btn-sm">Edit</a>
						<button type="submit" class="btn btn-danger btn-sm">Delate</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $user->links() }}
@endsection