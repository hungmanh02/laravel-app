<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=DB::table('categories')->get();
        return view('Admin.categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.categories.create');
    }

    // active status
    public function active_category_product($id){
        DB::table('categories')->where('id',$id)->update(['category_status'=>0]);
        return redirect()->route('categories.index')->with('success','Kích hoạt danh mục thành công');
    }
    public function unactive_category_product($id){
        DB::table('categories')->where('id',$id)->update(['category_status'=>1]);
        return redirect()->route('categories.index')->with('success','Không kích hoạt danh mục thành công');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataCreate=[
            'category_name'=>$request->category_name,
            'category_desc'=>$request->category_desc,
            'category_status'=>$request->category_status,
        ];
        DB::table('categories')->insert($dataCreate);
        return redirect()->route('categories.index')->with('success','create success');
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
        $category=DB::table('categories')->where('id',$id)->first();
        return view('Admin.categories.edit',['category'=>$category]);
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
        $dataUpdate=[
            'category_name'=>$request->category_name,
            'category_desc'=>$request->category_desc,
            'category_status'=>$request->category_status,
        ];
        DB::table('categories')->where('id',$id)->update($dataUpdate);
        return redirect()->route('categories.index')->with('success','update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->route('categories.index')->with('success','delete success');

    }
}
