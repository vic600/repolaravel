@extends('layouts.app')
@section('content')

<div class="row mb-2">
        @if (count($posts) > 0)
        @foreach ($posts as $post)
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-success">Design</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a>
              </h3>
              <div class="mb-1 text-muted">{{$post->created_at}} by <b>{{$post->user->name}}</b> </div>
              <p class="card-text mb-auto">{!!$post->body!!}</p>
              <a href="/posts/{{$post->id}}">Continue reading</a>
            </div>
            <div class="col-md-6"> <img class="card-img-right flex-auto d-none d-sm-block" src="/storage/coverimages/{{$post->cover_image}}" alt="Card image cap"></div>

          </div>
        </div>
        @endforeach
        <p>{{$posts->links()}}</p>
    @else
        <p>no posts found</p>
    @endif
      </div>


@endsection
