<!-- SECTION -->
@include('templateblog.head')
	<div class="section">
		<!-- container -->
		<div class="container">
			<div id="hot-post" class="row hot-post">
				
					@yield('contents')
				
				@include('templateblog.widget')
			</div>
		</div>
	</div>
@include('templateblog.footer')
