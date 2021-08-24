<?php

namespace App\Http\Controllers;

use Stripe;

use Illuminate\Http\Request;
use App\Models\myOrder;
use App\Models\myCart;
use DB;
use Auth;
use Session;
use Notification;

class PaymentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');  //the construct require user login before access the controller fucntion
    }

    public function paymentPost(Request $request)
    {       
	Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->sub*100,
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of southern online",
        ]);

        $newOrder=myOrder::Create([
            'paymentStatus' => 'Done',  //check any return parameter from Stripe
            'userID' => Auth::id(),
            'amount' => $request->sub,
        ]);

        $orderID=DB::table('my_orders')->where('userID','=',Auth::id())->orderBy('created_at','desc')->first();    //get the order ID just now created

        $items=$request->input('cid');
        foreach ($items as $item=>$value) {
            $carts=myCart::find($value);    //get the cart item record
            $carts->orderID=$orderID->id;   //binding the orderID value with record
            $carts->save();
        }

        $email='pangshian03@gmail.com';
        Notification::route('mail', $email)->notify(new \App\Notifications\orderPaid($email));

        Session::flash('success','Order successfully!');
        
        return back();
    }

    public function showOrder() {
        $orders=DB::table('my_orders')
        ->select('my_orders.id','my_orders.amount', 'my_orders.created_at')
        ->where('my_orders.userID', '=', Auth::id())
        ->get();

        //select my_carts.quantity as cartQty, my_carts.id as cid, products.* from my_carts
        //left join products on products.id=my_carts.productID where my_cart.orderID='' and
        //my_carts.userID='Auth::id()'
        Return view('myOrder')->with('orders', $orders);
    }
}