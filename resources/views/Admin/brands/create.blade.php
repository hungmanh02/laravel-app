@extends('Admin.layouts.app')
@section('title','Create Brand')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Create Brand
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('brands.store') }}" method="POST">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputName">brand Name</label>
                            <input type="text" name="brand_name" class="form-control" id="exampleInputName" placeholder="Enter brand name">
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Description</label>
                            <textarea style="resize: none" rows="5" class="form-control" name="brand_desc" id="ccomment" required=""></textarea>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Status</label>
                            <select class="form-control m-bot15" name="brand_status">
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