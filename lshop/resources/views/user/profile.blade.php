@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
  <h1>Profile</h1>
    </div>
    <div class="row justify-content-center">
        <h4>Orders</h4>
    </div>
    <div class="row justify-content-center">
            <div class="col-10">
                    <div class="accordion" id="accordionExample">
                        @foreach ($orders as $order)
                        <div class="card">

                            <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
               Order # {{$order->id}}
                                      </button>
                                    </h5>
                                  </div>
                                  @foreach ($order->cart->items as $item)
                                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                            <ul class="list-group">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                     {{$item['item']['title']}}
                                                      <span class="badge badge-primary badge-pill">{{$item['item']['price']}}</span>
                                                    </li>

                                                  </ul>
                                    </div>
                                  </div>
                            @endforeach
                              </div>

                        @endforeach

                      </div>
                  </div>
    </div>

    </div>
</div>

@endsection
