@extends('templatebn.home')
@section('subjudul','Tambah User')
@section('content')
	
	<a href="{{ route('user.index') }}" class="btn btn-light btn-sm">Kembali</a>
	<br/><br/>
	
	@if(count($errors)>0)
		@foreach($errors->all() as $errors)
			<div class="alert alert-danger" role="alert">{{ $errors }}</div>
		@endforeach
	@endif
	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">{{ Session('success') }}</div>
	@endif

	<form action="{{ route('user.store') }}" method="POST">
	@csrf
	<div class="form-group">
        <label>Nama User</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>Type</label>
        <select class="form-control" name="type">
        	<option disabled="" selected="">Pilih</option>
        	<option value="1">Administrator</option>
        	<option value="0">Penulis</option>
        </select>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="Password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block">Simpan User</button>
    </div>
    </form>
@endsection