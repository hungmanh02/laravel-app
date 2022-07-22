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
    public function login_customer()
    {

    }
    public function checkout(){
        return 'Checkout';
    }
}
