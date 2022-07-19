<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Categories</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ route('categories.create') }}">Add Category</a></li>
						<li><a href="{{ route('categories.index') }}">List Category</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Brands</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ route('brands.create') }}">Add Brand</a></li>
						<li><a href="{{ route('brands.index') }}">List Brand</a></li>
                    </ul>
                </li>
            </ul>         
           </div>
        <!-- sidebar menu end-->
    </div>
</aside>