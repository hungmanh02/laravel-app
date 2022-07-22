<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function login_checkout(){
        
        return view('Client.checkout.login_checkout');
    }
}
