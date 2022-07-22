<!DOCTYPE html>
<html lang="en">
<head>
    @include('Client.layouts.head')
</head><!--/head-->

<body>
    <!--header-->
	@include('Client.layouts.header')
    <!--/header-->
	<!--slider-->
	{{-- @include('Client.layouts.slider') --}}
	@yield('slider')
    <!--/slider-->
	{{-- content  --}}
	<section>
		<div class="container">
			<div class="row">
				{{-- @include('Client.layouts.nabar') --}}
				@yield('nabar')
   				@yield('content')
			</div>
		</div>
	</section>
	{{-- /content  --}}
	
	<!--Footer-->
	@include('Client.layouts.footer')
    <!--/Footer-->
	@include('Client.layouts.script')
</body>
</html>