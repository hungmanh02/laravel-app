<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('admin')->send();
        }
    }
    public function index()
    {
        return view('Admin.home.login');
    }
    public function admin_login(Request $request){
        $email=$request->email;
        $password=md5($request->password);
        $result=DB::table('admins')->where('email',$email)->where('password',$password)->first();
        if($result){
            Session::put('name',$result->name);
            Session::put('admin_id',$result->admin_id);
            return redirect()->route('dashboard');
        }else{
            Session::put('message','Email hoặc Mật khẩu bị sai, Vui lòng nhập lại');
            return redirect()->route('admin');
        }

    }
    public function admin_logout(Request $request){
        $this->AuthLogin();
        Session::put('name',null);
        Session::put('admin_id',null);
        return Redirect::to('admin/login');

    }

    public function dashboard()
    {
        $this->AuthLogin();
        return view('Admin.home.index');
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
