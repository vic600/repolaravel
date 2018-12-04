@extends('layouts.app')
@section('content')
    <h1></h1>
    <div class="blog-post">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            <p class="blog-post-meta">{{$post->created_at}} <a href="#">{{$post->user->name}}</a></p>

            <img src="/storage/coverimages/{{$post->cover_image}}" class="img-fluid" alt="">
            <p>{!!$post->body!!}</p>
          </div><!-- /.blog-post -->
          <hr>
          @if (!Auth::guest())
          @if (Auth::user()->id == $post->user_id)
          <a class="btn btn-default" href="/posts/{{$post->id}}/edit" role="button">Edit</a>
          {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
          {{Form::hidden('_method','DELETE')}}
          {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
          {!!Form::close()!!}
          @endif

          @endif

@endsection
