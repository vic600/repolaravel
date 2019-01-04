<?php


namespace App\paypal;


use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

class ExecutePayment extends paypal
{
    public  function executePay(){
        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId,$this->apiContext);

        $execution = $this->createExecute();


        $execution->addTransaction($this->transaction());

        $result = $payment->execute($execution, $this->apiContext);

        return $result;
}

    /**
     * @return PaymentExecution
     */
    protected function createExecute(): PaymentExecution
    {
        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));
        return $execution;
    }

    /**
     * @param Amount $amount
     * @return Transaction
     */
    protected function transaction(): Transaction
    {
        $transaction = new Transaction();
        $transaction->setAmount($this->amount());
        return $transaction;
    }
}