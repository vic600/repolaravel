@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    {{-- <div class="col-10">
        <div id="charge-error" class="alert alert-danger {{Session::has('error') ? 'hidden':''}}" role="alert">
            <strong>{{Session::get('error')}}</strong>
        </div>
    </div> --}}
</div>
<div class="row justify-content-center">

        <div class="col-md-10 order-md-1">
          {{-- <h4 class="mb-3">Shipping </h4> --}}
          <form class="needs-validation" method="POST" action="{{route('checkout')}}"  id="checkout-form">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control"  placeholder="" value="" name="fname" required>

              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control"  placeholder="" value="" name="lname" required>

              </div>
            </div>
            <div class="row">
                    <div class="col-md-6 mb-3">
                            <label for="email">Phone <span class="text-muted"></span></label>
                            <input type="tel" class="form-control"  placeholder="07" name="phone">

                          </div>

                          <div class="col-md-6 mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control"  placeholder="1234 Main St" name="address" required>

                          </div>
            </div>




            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>


            {{-- <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="card-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="card-number" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="cc-expiration">Expiration Year</label>
                <input type="text" class="form-control" id="card-expiry-year" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-4 mb-3">
                    <label for="cc-expiration">Expiration Month</label>
                    <input type="text" class="form-control" id="card-expiry-month" placeholder="" required>
                    <div class="invalid-feedback">
                      Expiration date required
                    </div>
                  </div>
              <div class="col-md-4 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control" id="card-cvc" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div> --}}
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="cc-cvv">Card</label>

                    <div id="card-element">

                    </div>
                  </div>
            </div>

            <div class="row justify-content-center">
                    <button class="btn btn-success btn-sm " type="submit"> Pay <span class="badge badge-danger"> $ {{$totalprice}}</span></button>
            </div>

            {{csrf_field()}}
          </form>
        </div>
      </div>
@endsection
@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('js/checkout.js')}}" ></script>
@endsection
