<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function category_brand(){
        $categories=DB::table('categories')->where('category_statys',0)->get(['id','category_name']);
        $brands=DB::table('brands')->where('brand_statys',0)->get(['id','brand_name']);
        return view('Client.layouts.nabar',['categories'=>$categories,'brands'=>$brands]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=DB::table('categories')->where('category_status',0)->get(['id','category_name']);
        $brands=DB::table('brands')->where('brand_status',0)->get(['id','brand_name']);
        $products=DB::table('products')->where('products.product_status',0)->get();
        return view('Client.home.index',['products'=>$products,'categories'=>$categories,'brands'=>$brands]);
    }
    public function category_product($id){
        $categories=DB::table('categories')->where('category_status',0)->get(['id','category_name']);
        $brands=DB::table('brands')->where('brand_status',0)->get(['id','brand_name']);
        $products=DB::table('products')
        ->join('categories','categories.id','=','products.category_id')
        ->where('categories.id',$id)
        ->where('products.product_status',0)
        ->get();
        $name_category=DB::table('categories')->where('id',$id)->first(['category_name']);
        return view('Client.category.category_product',
        ['products'=>$products,'categories'=>$categories,'brands'=>$brands,'name_category'=>$name_category]);
    }
    public function brand_product($id){
        $categories=DB::table('categories')->where('category_status',0)->get(['id','category_name']);
        $brands=DB::table('brands')->where('brand_status',0)->get(['id','brand_name']);
        $products=DB::table('products')
        ->join('brands','brands.id','=','products.brand_id')
        ->where('brands.id',$id)
        ->where('products.product_status',0)
        ->get();
        $name_brand=DB::table('brands')->where('id',$id)->first(['brand_name']);
        return view('Client.brand.brand_product',
        ['products'=>$products,'categories'=>$categories,'brands'=>$brands,'name_brand'=>$name_brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
