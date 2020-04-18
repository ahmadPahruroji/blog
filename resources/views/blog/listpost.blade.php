@extends('templateblog.content')

@section('contents')
<!-- post -->
<div class="col-md-8 hot-post-left">
	@foreach($data as $listpost)
<div class="post post-row">
						<a class="post-img" href="{{ route('blog.content', $listpost->slug) }}"><img src="{{ asset($listpost->gambar) }}" alt="{{ $listpost->judul }}"></a>
						<div class="post-body">
							<div class="post-category">
								<a href="category.html">{{ $listpost->category->name }}</a>
								<a href="category.html">Lifestyle</a>
							</div>
							<h3 class="post-title"><a href="blog-post.html">{{ $listpost->judul }}</a></h3>
							<ul class="post-meta">
								<li><a href="author.html">{{ $listpost->users->name }}</a></li>
								<li>{{ $listpost->created_at }}</li>
							</ul>
						</div>
					</div>
					@endforeach
					<center>{{ $data->links() }}</center>
				</div>

@endsection