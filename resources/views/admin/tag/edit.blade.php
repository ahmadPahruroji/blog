@extends('templatebn.home')
@section('subjudul','Edit Tag')
@section('content')
	
	<a href="{{ route('tag.index') }}" class="btn btn-light btn-sm">Kembali</a>
	<br/><br/>

	@if(count($errors)>0)
		@foreach($errors->all() as $errors)
			<div class="alert alert-danger" role="alert">{{ $errors }}</div>
		@endforeach
	@endif
	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">{{ Session('success') }}</div>
	@endif

	<form action="{{ route('tag.update', $tag->id) }}" method="POST">
	@csrf
	@method('patch')
	<div class="form-group">
        <label>Kategori</label>
        <input type="text" class="form-control" name="name" value="{{ $tag->name }}">
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block">Update Tag</button>
    </div>
    </form>
@endsection