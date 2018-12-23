@extends('layouts.app')
@section('content')

<div class="row justify-content-center">


    <div class="col-md-10 order-md-1">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">{{$totalqty}}</span>
          </h4>
          <ul class="list-group mb-3">
              @foreach ($products as $product)
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">{{$product['item']['title']}} <span class="badge badge-success">{{$product['qty']}}</span></h6>
                      <small class="text-muted">{{$product['item']['description']}}</small>
                      <a href="{{route('remove',['id'=>$product['item']['id']])}}" class="btn btn-sm btn-primary">-</a>
                      <a href="{{route('removeitem',['id'=>$product['item']['id']])}}" class="btn btn-sm btn-danger">Delete</a>
                    </div>

                    <span class="text-muted">{{$product['price']}}</span>
                  </li>
              @endforeach


            <li class="list-group-item d-flex justify-content-between">
              <span>Total </span>
              <strong>${{$totalprice}}</strong>
            </li>
          </ul>
<div class="row justify-content-end">
        <form class="card p-2 ">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Promo code">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">Redeem</button>
                  </div>
                </div>
              </form>
</div>

          <p>
                <div class="row justify-content-center">

                        <a href="{{route('checkout')}}" class="btn btn-success btn-sm">Checkout</a>
                    </div>
          </p>

        </div>

  </div>
@endsection
