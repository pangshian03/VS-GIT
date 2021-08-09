<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Models\myCart; //import
use App\Models\Product; //import
use App\Models\Categoty; //import

use Auth;

use Session;

class CartController extends Controller
{
    public function __construct() {
        $this->middleware('auth');  //the construct require user login before access the controller fucntion
    }

    public function add() {
        $r=request();
        $addItem=myCart::create([
            'quantity'=>$r->quantity,
            'orderID'=>'',
            'product'=>$r->id,
            'userID'=>Auth::id(),
        ]);
        Return redirect()->route('Product');
    }

    public function showMyCart() {
        $carts=DB::table('my_carts')
        ->leftjoin('products', 'products.id', '=', 'my_carts.productID')
        ->select('my_carts.quantity as cartQty', 'my_carts.id as cid', 'products.*')
        ->where('my_cart.orderID', '=', '') //the item haven't make payment
        ->where('my_carts.userID', '=', Auth::id())
        ->get();

        //select my_carts.quantity as cartQty, my_carts.id as cid, products.* from my_carts
        //left join products on products.id=my_carts.productID where my_cart.orderID='' and
        //my_carts.userID='Auth::id()'
        Return view('myCart')->with('carts', $carts);
    }
}