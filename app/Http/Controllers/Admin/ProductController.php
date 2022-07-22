<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
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
        $products=DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->join('brands','products.brand_id','=','brands.id')
        ->orderBy('products.id','desc')
        ->get(['categories.category_name','brands.brand_name','products.*']);
        return view('Admin.products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        $categories=DB::table('categories')->orderBy('id','desc')->get();
        $brands=DB::table('brands')->orderBy('id','desc')->get();
        return view('Admin.products.create',['categories'=>$categories,'brands'=>$brands]);
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
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'product_desc'=>$request->product_desc,
            'product_content'=>$request->product_content,
            'product_status'=>$request->product_status,
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
        ];
        // xử lý file ảnh thêm vào table product
        // kiểm tra file
        if($request->hasFile('product_image')){
            $get_image=$request->file('product_image');
            $get_name_image=$get_image->getClientOriginalName();//lấy tên của hình ảnh
            $name_image=current(explode('.',$get_name_image)); //phân tên ra từ dấu chấm 2 phần crrent là lấy phần ở trên
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi file của hình ảnh và nối với số ngẫu nhiên
            $get_image->move('uploads/product',$new_image);// lưu file
            $dataCreate['product_image']=$new_image;
            DB::table('products')->insert($dataCreate);
            return redirect()->route('products.index')->with(['success','create success']);
        }
        // nếu không chọn file ảnh thì thêm ảnh mặc định
        $dataCreate['product_image']='default.png';
        DB::table('products')->insert($dataCreate);
        return redirect()->route('products.index')->with(['success','create success']);

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
        $categories=DB::table('categories')->orderBy('id','desc')->get(['id','category_name']);
        $brands=DB::table('brands')->orderBy('id','desc')->get(['id','brand_name']);
        $product=DB::table('products')->where('id',$id)->first();
        return view('Admin.products.edit',['product'=>$product,'categories'=>$categories,'brands'=>$brands]);
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
        $dataUpdata=[
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'product_desc'=>$request->product_desc,
            'product_content'=>$request->product_content,
            'product_status'=>$request->product_status,
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
        ];
        // xử lý file ảnh update vào table product
        // kiểm tra file
        // nếu chọn ảnh khác thì xử lý cón không thì sẽ lấy ảnh củ
        if($request->hasFile('product_image')){
            $get_image=$request->file('product_image');
            $get_name_image=$get_image->getClientOriginalName();//lấy tên của hình ảnh
            $name_image=current(explode('.',$get_name_image)); //phân tên ra từ dấu chấm 2 phần crrent là lấy phần ở trên
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi file của hình ảnh và nối với số ngẫu nhiên
            $get_image->move('uploads/product',$new_image);// lưu file
            $dataUpdata['product_image']=$new_image;
            DB::table('products')->where('id',$id)->update($dataUpdata);
            return redirect()->route('products.index')->with(['success','update success']);
        }
        DB::table('products')->where('id',$id)->update($dataUpdata);
        return redirect()->route('products.index')->with(['success','update success']);
        
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
    public function active_product($id){
        $this->AuthLogin();
        DB::table('products')->where('id',$id)->update(['product_status'=>0]);
        return redirect()->route('products.index')->with('success','Kích hoạt sản phẩm thành công');
    }
    public function unactive_product($id){
        $this->AuthLogin();
        DB::table('products')->where('id',$id)->update(['product_status'=>1]);
        return redirect()->route('products.index')->with('success','Không kích hoạt sản phẩm thành công');
    }
}
