@extends('Admin.layouts.app')
@section('title','List Brand')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Responsive Table
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        @if (session('success'))
            <span class="text-success">{{ session('success') }}</span>
        @endif
        @if (session('message'))
            <span class="text-danger">{{ session('message') }}</span>
        @endif
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:30px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Stt</th>
              <th>Brand Name</th>
              <th>Brand Status</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($brands as  $key=>$item)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{ $key+1 }}</td>
              <td><span class="text-ellipsis">{{ $item->brand_name }}</span></td>
              <td>
                    @if ($item->brand_status==1)
                    <a href="{{ route('active-brand',$item->id) }}"><i class="fa fa-thumbs-down fa-thumb-styling"></i></a>
                    @else
                    <a href="{{ route('unactive-brand',$item->id) }}"><i class="fa fa-thumbs-up fa-thumb-styling"></i></a>
                    @endif
              <td>
                <a href="{{ route('brands.edit',$item->id) }}" class="active styling-icon" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <form action="{{ route('brands.destroy',$item->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button onclick="return confirm('Bạn có chắc xóa thương hiệu này không  ?')" class="active styling-icon" ui-toggle-class="" type="submit"><i class="fa fa-times text-danger text"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection