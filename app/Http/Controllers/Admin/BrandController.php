<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('admin')->send();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AuthLogin();
        $brands=DB::table('brands')->get();
        return view('Admin.brands.index',['brands'=>$brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        return view('Admin.brands.create');
    }

    public function active_brand($id){
        $this->AuthLogin();
        DB::table('brands')->where('id',$id)->update(['brand_status'=>0]);
        return redirect()->route('brands.index')->with('success','Kích hoạt thương hiệu thành công');
    }
    public function unactive_brand($id){
        $this->AuthLogin();
        DB::table('brands')->where('id',$id)->update(['brand_status'=>1]);
        return redirect()->route('brands.index')->with('success','Không kích hoạt thương hiệu thành công');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->AuthLogin();
        $dataCreate=[
            'brand_name'=>$request->brand_name,
            'brand_desc'=>$request->brand_desc,
            'brand_status'=>$request->brand_status,
        ];
        DB::table('brands')->insert($dataCreate);
        return redirect()->route('brands.index')->with('success','create success');
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
        $this->AuthLogin();
        $brand=DB::table('brands')->where('id',$id)->first();
        return view('Admin.brands.edit',['brand'=>$brand]);
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
        $this->AuthLogin();
        $dataUpdate=[
            'brand_name'=>$request->brand_name,
            'brand_desc'=>$request->brand_desc,
            'brand_status'=>$request->brand_status,
        ];
        DB::table('brands')->where('id',$id)->update($dataUpdate);
        return redirect()->route('brands.index')->with('success','update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->AuthLogin();
        DB::table('brands')->where('id',$id)->delete();
        return redirect()->route('brands.index')->with('success','delete success');

    }
}
