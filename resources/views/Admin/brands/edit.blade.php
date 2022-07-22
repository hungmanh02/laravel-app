@extends('Admin.layouts.app')
@section('title','Edit Brand')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Edit Category
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('brands.update',$brand->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputName">brand Name</label>
                            <input type="text" name="brand_name" class="form-control" 
                            id="exampleInputName" placeholder="Enter brand name" value="{{ old('brand_name') ??$brand->brand_name }}">
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Description</label>
                            <textarea style="resize: none" rows="5" class="form-control" name="brand_desc" id="ccomment" required="">{{ old('brand_desc') ??$brand->brand_desc }}</textarea>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Status</label>
                            <select class="form-control m-bot15" name="brand_status">
                                @if ($brand->brand_status==1)
                                <option value="{{$brand->brand_status}}" selected>Ẩn</option>
                                <option value="0">Hiện thị</option>
                                @else
                                <option value="{{$brand->brand_status}}" selected>Hiện thị</option>
                                <option value="1">Ẩn</option>
                                @endif
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