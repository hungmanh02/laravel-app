<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product_detail($id){
        $categories=DB::table('categories')->where('category_status',0)->get(['id','category_name']);
        $brands=DB::table('brands')->where('brand_status',0)->get(['id','brand_name']);
        $productDetail=DB::table('products')
        ->join('brands','brands.id','=','products.brand_id')
        ->join('categories','categories.id','=','products.category_id')
        ->where('products.id',$id)
        ->where('products.product_status',0)
        ->first(['products.*','categories.category_name','categories.id as category_id','brands.brand_name']);
        // sản phẩm liên quan
        $category_id=$productDetail->category_id;
        $related_product=DB::table('products')
        ->join('brands','brands.id','=','products.brand_id')
        ->join('categories','categories.id','=','products.category_id')
        ->where('categories.id',$category_id)
        ->where('products.product_status',0)
        ->whereNotIn('products.id',[$id])
        ->get(['products.*']);

        return view('Client.product.product_detail',
        ['categories'=>$categories,'brands'=>$brands,'productDetail'=>$productDetail,'related_product'=>$related_product]);
    }
}
