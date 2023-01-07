<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){


        $old_cartitems = Cart::where('user_id',Auth::id())->get(); //pentru a lua toate itemele din checkout page si pentru a verifica daca sunt in stoc
        foreach($old_cartitems as $item){
            if(!Product::where('id', $item->prod_id)->where('qty','>',$item->prod_qty)->exists())
            {
                $removeItem=Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first(); // se alege itemul care nu este in stoc
                $removeItem->delete(); //se sterge din cart (mai raman doar obiecte care vor fi transmise in $cartitems)
            }
        }

        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout', compact('cartitems'));
    
    }

    public function placeorder(Request $request){
        $order= new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->zipcode = $request->input('zipcode');
        $order->tracking_no = rand(1111,9999);
        

        $total=0;
        $cartitems_total = Cart::where('user_id',Auth::id())->get();
        foreach($cartitems_total as $item){
            $total += $item->products->selling_price;
        }


        $order->total_price = $total;
        $order->save();
        
        $cartitems = Cart::where('user_id',Auth::id())->get();

        foreach($cartitems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,
            ]);

            $prod = Product::where('id',$item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        if(Auth::user()->address1==NULL){
            $user = User::where('id', Auth::id())->first();
            $user->fname = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->zipcode = $request->input('zipcode');
            $user->update();
        }

        $cartitems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect('/')->with('status',"Order Placed Successfully");
    }
}
