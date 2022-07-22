@extends('Admin.layouts.app')
@section('title','Create Product')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Create Product
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputName">Product Name</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputName" placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPrice">Product Price</label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputPrice" placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputImage">Product Image</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputImage" placeholder="Enter product name">
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-4">Product Description</label>
                            <textarea style="resize: none" rows="5" class="form-control" name="product_desc" id="ccomment" required=""></textarea>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Product Content</label>
                            <textarea style="resize: none" rows="5" class="form-control" name="product_content" id="ccomment" required=""></textarea>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Category</label>
                            <select class="form-control m-bot15" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id}}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Brand</label>
                            <select class="form-control m-bot15" name="brand_id">
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Product Status</label>
                            <select class="form-control m-bot15" name="product_status">
                                <option value="1">Ẩn</option>
                                <option value="0">Hiện thị</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection