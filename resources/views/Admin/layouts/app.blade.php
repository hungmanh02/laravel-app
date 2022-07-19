<!DOCTYPE html>
<head>
@include('Admin.layouts.head')
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
@include('Admin.layouts.header')
</header>
<!--header end-->
<!--sidebar start-->
@include('Admin.layouts.slider')
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
<!-- content start-->
    <section class="wrapper">
            @yield('content')
    </section>
<!-- content end-->
	
 <!-- footer -->
		 @include('Admin.layouts.footer')
  <!-- / footer -->
</section>
<!--main content end-->
</section>
@include('Admin.layouts.script')
</body>
</html>
