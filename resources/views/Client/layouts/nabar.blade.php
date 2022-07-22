<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <!--category-productsr-->
        <div class="panel-group category-products" id="accordian">
            @foreach ($categories as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{ URL::to('/category-product',$category->id) }}">{{ $category->category_name }}</a></h4>
                </div>
            </div>
            @endforeach
        </div>
        <!--/category-products-->
        <!--brands_products-->
        <div class="brands_products">
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    @foreach ($brands as $brand)
                    <li><a href="{{ URL::to('/brand-product',$brand->id) }}"> <span class="pull-right">(50)</span>{{ $brand->brand_name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!--/brands_products-->
        <!--price-range--><!--/price-range-->
        <div class="shipping text-center"><!--shipping-->
            <img src="{{ asset('Client/assets/images/home/shipping.jpg') }}" alt="" />
        </div><!--/shipping-->
    
    </div>
</div>