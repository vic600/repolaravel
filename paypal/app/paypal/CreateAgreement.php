<?php


namespace App\paypal;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\ShippingAddress;

class CreateAgreement extends paypal
{
public function create($id){
    return redirect($this->agreement($id));



}

    /**
     * @return String
     */
    protected function agreement($id): String
    {
        $agreement = new Agreement();

        $agreement->setName('Base Agreement')
            ->setDescription('Basic Agreement')
            ->setStartDate('2019-06-17T9:45:04Z');
        $this->plan($id, $agreement);
        $this->payer($agreement);
        $this->shipping($agreement);
        $agreement = $agreement->create($this->apiContext);


        return $agreement->getApprovalLink();
    }

    /**
     * @param $id
     * @param Agreement $agreement
     */
    protected function plan($id, Agreement $agreement): void
    {
        $plan = new Plan();
        $plan->setId($id);
        $agreement->setPlan($plan);
    }

    /**
     * @param Agreement $agreement
     */
    protected function payer(Agreement $agreement): void
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);
    }

    /**
     * @param Agreement $agreement
     */
    protected function shipping(Agreement $agreement): void
    {
        $shippingAddress = new ShippingAddress();
        $shippingAddress->setLine1('111 First Street')
            ->setCity('Saratoga')
            ->setState('CA')
            ->setPostalCode('95070')
            ->setCountryCode('US');
        $agreement->setShippingAddress($shippingAddress);
    }

    public function createA($token){
        $agreement = new Agreement();
        $agreement->execute($token, $this->apiContext);
    }
}