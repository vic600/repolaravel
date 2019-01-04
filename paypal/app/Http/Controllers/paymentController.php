<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\paypal\CreatePayment;
use App\paypal\ExecutePayment;
class paymentController extends Controller
{


// create payment

public function makePayment(){

$payment= new CreatePayment();
return $payment->createPay();
}


// execute payment
public function executePay(Request $request ){

    $payment=new ExecutePayment();
    return $payment->executePay();

}
}
