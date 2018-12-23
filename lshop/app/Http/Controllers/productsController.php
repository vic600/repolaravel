<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;
use App\products;
use Session;
use Auth;
use App\Orders;
use Stripe\Charge;
use Stripe\Stripe;
class productsController extends Controller
{
    public function getIndex(){
        $product=products::orderby('id','desc')->paginate(6);
        return view('shop.index',['products'=>$product]);
    }
    public function getCart(Request $request,$id){
        $product=products::find($id);
      $cart=Session::has('cart') ? Session::get('cart') : null;
    //   $cart=new Cart($oldcart);
    //   $cart->add($product,$product->id);
      if(!$cart)
      {
       $cart = new Cart($cart);
      }

      $cart->add($product, $product->id);

      Session::put('cart', $cart);
      return redirect()->route('product.index');
    //   $request->session()->put('cart',$cart);
    // //   dd($request->session()->get('cart'));
    //   return redirect()->route('product.index');
    }

    public function removeOneItem($id){
     $cart=Session::has('cart')?Session::get('cart'):null;
     if(!$cart){
        $cart =new Cart($cart);
     }

     $cart->removeItem($id);
     if(count($cart->items) > 0){
        Session::put('cart',$cart);
    }else{
        Session::forget('cart');
    }
     return redirect()->route('product.shopping')->with('success','Item Reduced');
    }

    public function removeAllItem($id){
        $cart =Session::has('cart')?Session::get('cart'):null;
        if(!$cart){
            $cart=new Cart();
        }
        $cart->removeAllItem($id);
        if(count($cart->items ) > 0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }

        return redirect()->route('product.shopping')->with('success','Item Removed');
    }

    public function getShopping(){
        if(!Session::has('cart')){
        return redirect()->route('product.index')->with('info','No Products added to cart');
        }
        $cart=Session::get('cart');
        return view('shop.shopping',['products'=>$cart->items,'totalprice'=>$cart->totalprice,'totalqty'=>$cart->totalqty]);
    }

    public function getCheckout(){
        // check if cart exists
        if(!Session::has('cart')){
            return redirect()->route('product.index')->with('info','No Products added to cart');
        }
        $cart= Session::get('cart');
        $total=$cart->totalprice;
        return view('shop.checkout',['totalprice'=>$total]);
    }

    public function postCheckout(Request $request){
        if(!Session::has('cart')){
            return redirect()->route('product.index')->with('info','No Products added to cart');
        }
        $cart=Session::get('cart');
        $total=$cart->totalprice;
        $token=$request->input('stripeToken');
            Stripe::setApiKey('sk_test_qf36hZJZ6UPf32FXKyFfigPF');
            try{
                $charge=Charge::create(array(
                'amount' => $total * 100,
                'currency' => 'usd',
                'description' => 'Example charge',
                'source' => $token,
                ));
                $order=new Orders();
                $order->cart=serialize($cart);
                $order->payment_id=$charge->id;
                $order->address=$request->input('address');
                $order->fname=$request->input('fname');
                $order->lname=$request->input('lname');
                $order->phone=$request->input('phone');

                Auth::user()->orders()->save($order);

            }catch(\Exception $e){
                return redirect()->route('checkout')->with('error',$e->getMessage());
            }

            Session::forget('cart');
            return redirect()->route('user.profile')->with('success','transaction complete');
    }
}
