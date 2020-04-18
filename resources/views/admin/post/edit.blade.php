@extends('templatebn.home')
@section('subjudul','Edit Post')
@section('content')
	
	<a href="{{ route('post.index') }}" class="btn btn-light btn-sm">Kembali</a>
	<br/><br/>

	@if(count($errors)>0)
		@foreach($errors->all() as $errors)
			<div class="alert alert-danger" role="alert">{{ $errors }}</div>
		@endforeach
	@endif
	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">{{ Session('success') }}</div>
	@endif

	<form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('patch')
	<div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control" name="judul" value="{{{ $post->judul }}}">
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="category_id">
        	<option disabled="" selected="">Pilih</option>
        	@foreach($category as $result)
        	<option value="{{ $result->id }}"
        		@if($result->id == $post->category_id)
        		selected
        		@endif>{{ $result->name }}</option>
        	@endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Tag</label>
        <select class="form-control select2" multiple="" name="tags[]">
        	@foreach($tags as $tag)
        	<option value="{{ $tag->id }}" 
        		@foreach($post->tags as $taks) 
        		@if($tag->id == $taks->id)
        		selected
        		@endif 
        		@endforeach>{{ $tag->name }}</option>
        	@endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Kontent</label>
        <textarea class="form-control" name="content" id="content">{{ $post->content }}</textarea>
    </div>
    <div class="form-group">
        <label>Thumbnail</label>
        <input type="file" class="form-control-file" name="gambar">
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block">Update Post</button>
    </div>
    </form>
@endsection
@section('scripth')
<script src="{{ asset('public/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection