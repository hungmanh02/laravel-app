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
	@include('Client.layouts.slider')
    <!--/slider-->
	{{-- content  --}}
    @yield('content')
	{{-- /content  --}}
	
	<!--Footer-->
	@include('Client.layouts.footer')
    <!--/Footer-->
	@include('Client.layouts.script')
</body>
</html>