@extends('Admin.layouts.app')
@section('title','Create Category')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Create Category
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('categories.store') }}" method="POST">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputName">Category Name</label>
                            <input type="text" name="category_name" class="form-control" id="exampleInputName" placeholder="Enter category name">
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Description</label>
                            <textarea style="resize: none" rows="5" class="form-control" name="category_desc" id="ccomment" required=""></textarea>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Status</label>
                            <select class="form-control m-bot15" name="category_status">
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