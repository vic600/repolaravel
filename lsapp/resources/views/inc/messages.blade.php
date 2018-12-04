@if (count($errors) > 0)
@foreach ($errors->all() as $error)
   <div class="alert alert-danger" role="alert">
       <strong>ERROR!</strong>{{$error}}
   </div>
@endforeach
@endif

@if (session('success'))
<div class="alert alert-success" role="alert">
        <strong>SUCCESS!</strong>{{session('success')}}
    </div>
@endif

@if (session('error'))
<div class="alert alert-danger" role="alert">
        <strong>ERROR!</strong>{{session('error')}}
    </div>
@endif
