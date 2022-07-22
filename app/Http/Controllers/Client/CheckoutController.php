<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        return view('Client.checkout.login_checkout');
    }
    public function add_customer(Request $request)
    {
        $dataCreate=[
            'customer_name'=>$request->name,
            'customer_email'=>$request->email,
            'customer_password'=>md5($request->password),
            
        ];
        $customer_id=DB::table('customers')->insertGetId($dataCreate);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->name);
        return redirect()->route('checkout');
    }
    public function save_checkout(Request $request){
        $dataCreate=[
            'shipping_name'=>$request->shipping_name,
            'shipping_address'=>$request->shipping_address,
            'shipping_notes'=>$request->shipping_notes,
            'shipping_email'=>$request->shipping_email,
            'shipping_phone'=>$request->shipping_phone,
            
        ];
        $shipping_id=DB::table('shippings')->insertGetId($dataCreate);
        Session::put('shipping_id',$shipping_id);
        // return redirect()->route('payment');
    }
    public function logout_checkout()
    {
        Session::flush();
        return redirect()->route('login-checkout');
    }
    public function login_customer(Request $request)
    {
        $email=$request->customer_email;
        $password=md5($request->customer_password);
        $result=DB::table('customers')->where('customer_email',$email)->where('customer_password',$password)->first();
        Session::put('customer_id',$result->customer_id);
        return redirect()->route('checkout');
    }
    public function checkout(){
        return view('Client.checkout.show_checkout');
    }
    public function payment(){

    }
}
