@extends('Admin.layouts.app')
@section('title','Edit Category')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Edit Category
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('categories.update',$category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputName">Category Name</label>
                            <input type="text" name="category_name" class="form-control" 
                            id="exampleInputName" placeholder="Enter category name" value="{{ old('category_name') ??$category->category_name }}">
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Description</label>
                            <textarea style="resize: none" rows="5" class="form-control" name="category_desc" id="ccomment" required="">{{ old('category_desc') ??$category->category_desc }}</textarea>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Status</label>
                            <select class="form-control m-bot15" name="category_status">
                                @if ($category->category_status==1)
                                <option value="{{$category->category_status}}" selected>Ẩn</option>
                                <option value="0">Hiện thị</option>
                                @else
                                <option value="{{$category->category_status}}" selected>Hiện thị</option>
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