@extends('layouts.app')
@section('content')
<main role="main">

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Album example</h1>
    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
    <p>
      <a href="#" class="btn btn-primary my-2">Main call to action</a>
      <a href="#" class="btn btn-secondary my-2">Secondary action</a>
    </p>
  </div>
</section>

<div class="album py-5 bg-light">
  <div class="container">

@if (count($products) > 0)
     {{-- @foreach ($products->chunk(3) as $productChunks) --}}
     <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                      <img class="card-img-top" src="{{$product->imagepath}}" height="200" alt="Card image cap">

                      <div class="card-body">
                            <h4>{{$product->title}}</h4>
                        <p class="card-text">{{$product->description}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="{{route('product.cart',['id'=>$product->id])}}" class="btn btn-sm btn-success">Add to cart</a>

                          </div>
                          <small class="text-muted"> <h2><b>${{$product->price}}</b></h2> </small>
                        </div>
                      </div>
                    </div>
                  </div>
            @endforeach
            <div class="content-center">
                    {{$products->links()}}
            </div>



         </div>
        {{-- @endforeach --}}
@else
<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">No Products!</h4>
        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
      </div>
@endif




  </div>
</div>

</main>
@endsection
