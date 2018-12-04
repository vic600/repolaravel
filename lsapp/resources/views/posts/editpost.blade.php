@extends('layouts.app')
@section('content')
<h1>Edit Post</h1>
{!!Form::open(['action'=>['PostsController@update',$post->id],'method'=>'POST','enctype'=>'multipart/form-data'])!!}
{{Form::label('title','Title:')}}
<div class="form-group">
{{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title'])}}
</div>
{{Form::label('body','Body')}}
<div class="form-group">
  {{Form::textarea('body',$post->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'post body'])}}
</div>
{{Form::label('cover','Cover')}}
<div class="form-group">
  {{Form::file('cover_image')}}
</div>
{{Form::hidden('_method','PUT')}}
{{Form::submit('Submit',['class'=>'btn btn-sm btn-dark'])}}
{!!Form::close()!!}
@endsection
