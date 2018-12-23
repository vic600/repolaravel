@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">

                <div class="col-10">
                        <form action="{{route('user.signin')}}" method="post">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email address</label>
                                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                  {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>

                                <button type="submit" class="btn btn-sm btn-primary float-right">SignIn</button>
                                {{csrf_field()}}
                              </form>
                              <p>No Account Yet?<a href="{{route('user.signup')}}">Register</a></p>

                </div>

            </div>

</div>


@endsection
