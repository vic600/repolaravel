<?php


namespace App\paypal;


use PayPal\Api\Amount;
use PayPal\Api\Details;

class paypal
{
    protected $apiContext;
 public function __construct()
 {
     $this->apiContext = new \PayPal\Rest\ApiContext(
         new \PayPal\Auth\OAuthTokenCredential(
             config('services.paypal.id'),
         config('services.paypal.secret')// ClientSecret
         )
     );
 }

    /**
     * @return Details
     */
    protected function details(): Details
    {
        $details = new Details();
        $details->setShipping(2.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);
        return $details;
    }

    /**
     * @param Details $details
     * @return Amount
     */
    protected function amount(): Amount
    {
        $amount = new Amount();
        $amount->setCurrency('USD');
        $amount->setTotal(21);
        $amount->setDetails($this->details());
        return $amount;
    }
}