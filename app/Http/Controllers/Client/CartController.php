<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    public function save_cart(Request $request){
         $productId=$request->productIdHidden;
         $quantity=$request->qty;
         $product_info=DB::table('products')->where('id',$productId)->first();
         $dataAdd['id']=$product_info->id;
         $dataAdd['qty']=$quantity;
         $dataAdd['name']=$product_info->product_name;
         $dataAdd['price']=$product_info->product_price;
         $dataAdd['weight']=$product_info->product_price;
         $dataAdd['options']['image']=$product_info->product_image;
         Cart::add($dataAdd);
         Cart::setGlobalTax(10);
        // Cart::destroy();
        return redirect()->route('show-cart');
         // id,qty,name,price,weight những trường bắt buộc của shopping cart , options là trường tự thêm các phần tử vào

    }
    public function show_cart(){
        return view('Client.carts.show_cart');
    }
    public function quantity_product_cart(Request $request,$rowId){
        $rowId=$request->rowId;
        $quantity=$request->quantity;
        Cart::update($rowId,$quantity);
        return redirect()->route('show-cart');
    }
    public function delete_product_cart($rowId){
        Cart::remove($rowId);
        return redirect()->route('show-cart');
    }
    
}
