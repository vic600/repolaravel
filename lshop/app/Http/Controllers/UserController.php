<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
class UserController extends Controller
{
   public function getSignup(){
       return view('user.signup');
   }
   public function postSignup(Request $request){
       $this->validate($request,[
           'email'=>'email|required|unique:users',
           'password'=>'required|min:4'
       ]);
     $user=new User([
         'email'=>$request->input('email'),
         'password'=>bcrypt($request->input('password'))
     ]);
     $user->save();
     Auth::login($user);
    //  check for old url in session
     if(Session::has('OldUrl')){
// get the old url
         $oldurl=Session::get('OldUrl');
         Session::forget('OldUrl');
         return redirect()->to($oldurl);
     }
     return redirect()->route('user.profile')->with('success','User Registerd');
   }

   public function getSignin(){
       return view('user.signin');
   }
   public function postSignin(Request $request){
       $this->validate($request,[
           'email'=>'email|required',
           'password'=>'required|min:4'
       ]);
      if( Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
          if(Session::has('OldUrl')){
              $oldurl=Session::get('OldUrl');
              Session::forget('OldUrl');
              return redirect()->to($oldurl);
          }
       return redirect()->route('user.profile')->with('success','Welcome');
       }
     return redirect()->back()->with('error','Try Again,Wrong Email or Password');
   }

   public function getProfile(){
    //    get orders
    $orders=Auth::user()->orders;
    $orders->transform(function($order,$key){
        $order->cart=unserialize($order->cart);
        return $order;
    });
       return view('user.profile',['orders'=>$orders]);
   }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('user.signin')->with('success','Goodbye');
    }
}
