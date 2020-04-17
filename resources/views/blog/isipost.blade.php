@extends('templateblog.content')

@section('contents')

@foreach($data as $content)
<div id="post-header" class="page-header">
	<div class="page-header-bg" style="background-image: url({{ asset($content->gambar) }});" data-stellar-background-ratio="0.5"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="post-category">
					<a href="category.html">{{ $content->category->name }}</a>
				</div>
				<h1>{{ $content->judul }}</h1>
				<ul class="post-meta">
					<li><a href="author.html">{{ $content->users->name }}</a></li>
					<li>{{ $content->created_at }}</li>
					{{-- <li><i class="fa fa-comments"></i> 3</li> --}}
					{{-- <li><i class="fa fa-eye"></i> 807</li> --}}
				</ul>
			</div>
		</div>
	</div>
</div>
</header>
<div class="col-md-8 hot-post-left">
<br>
<div class="section-row">
	{{ $content->content }}
</div>
@endforeach
</div>
@endsection