<?php


namespace App\paypal;

use PayPal\Api\Payer;
use PayPal\Api\Transaction;

use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Item;
use PayPal\Api\ItemList;

class CreatePayment extends paypal
{
public  function createPay(){
    $item1 = new Item();
    $item1->setName('Ground Coffee 40 oz')
        ->setCurrency('USD')
        ->setQuantity(1)
        ->setSku("123123") // Similar to `item_number` in Classic API
        ->setPrice(7.5);
    $item2 = new Item();
    $item2->setName('Granola bars')
        ->setCurrency('USD')
        ->setQuantity(5)
        ->setSku("321321") // Similar to `item_number` in Classic API
        ->setPrice(2);

    $itemList = new ItemList();
    $itemList->setItems(array($item1, $item2));


    $payment = $this->Payment($itemList);

    $payment->create($this->apiContext);
    $approvalUrl = $payment->getApprovalLink();
    return redirect($approvalUrl);
}

    /**
     * @return Payer
     */
    protected function Payer(): Payer
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        return $payer;
    }



    /**
     *
     * @param ItemList $itemList
     * @return Transaction
     */
    protected function Transaction( ItemList $itemList): Transaction
    {
        $transaction = new Transaction();
        $transaction->setAmount($this->amount())
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());
        return $transaction;
    }

    /**
     * @return RedirectUrls
     */
    protected function RedirectUrls(): RedirectUrls
    {
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(config('services.paypal.urls.redirect'))
            ->setCancelUrl(config('services.paypal.urls.cancel'));
        return $redirectUrls;
    }

    /**
     * @param Payer $payer
     * @param RedirectUrls $redirectUrls
     * @param Transaction $transaction
     * @return Payment
     */
    protected function Payment( $itemList): Payment
    {
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($this->payer())
            ->setRedirectUrls($this->redirectUrls())
            ->setTransactions(array($this->transaction($itemList)));
        return $payment;
    }
}