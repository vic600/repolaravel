<?php

namespace App\Http\Controllers;
use App\paypal\CreateAgreement;
use App\paypal\CreatePlan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    public function  createPlan(){
        $plan=new CreatePlan();
        $plan->create();
    }

    public function listPlan(){
        $plan= new CreatePlan();
        return $plan->listPlan();
    }

  public function showPlan($id){
      $plan= new CreatePlan();
      return $plan->planDetails($id);

  }
  public function activatePlan($id){
      $plan= new CreatePlan();
      $plan->activate($id);
  }

  public  function createAgreement($id){
        $agreement=new CreateAgreement();
       return $agreement->create($id);
  }
 public function paypalAgreement($status){
        if($status == 'true'){
            $agreement = new CreateAgreement();
            $agreement->createA(request('token'));
            return 'done';
        }
 }

}