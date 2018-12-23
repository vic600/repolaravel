<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal"> {{ config('app.name', 'SHOP') }}</h5>
    <a class="fas fa-shopping-cart" href="{{route('product.shopping')}}" ><span class="badge badge-primary">{{Session::has('cart')?Session::get('cart')->totalqty : 0}}</span> </a>

    @if (Auth::check())
    <a class="fas fa-user"  href="{{ route('user.profile') }}" >{{Auth::user()->email}}</a>
    <nav class="my-2 my-md-0 mr-md-3">

      {{-- <a class="p-2 text-dark"  href="{{ route('user.profile') }}">Profile</a> --}}
      <a class="p-2 text-dark" href="{{ route('user.logout') }}">Logout</a>

    </nav>

    @else
    <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ route('user.signin') }}">Login</a>
            <a class="p-2 text-dark"href="{{ route('user.signup') }}">Register</a>
          </nav>

    @endif
  </div>

