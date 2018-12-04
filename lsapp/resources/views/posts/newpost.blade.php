@extends('layouts.app')
@section('content')

    <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Create Post</h4>
            {!! Form::open(['action' => 'PostsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}


              <div class="mb-3">
                    {{Form::label('title','Title')}}
                <div class="input-group">

                        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
                </div>
              </div>

              <div class="mb-3">
                    {{Form::label('body','Body')}}
                    <div class="input-group">
                    {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Post body'])}}
                    </div>
              </div>
              <div class="mb-3">
                {{Form::label('cover','Cover')}}
                <div class="input-group">
                {{Form::file('cover_image')}}
                </div>
          </div>

              <hr class="mb-4">
              {{Form::submit('Submit',['class'=>'btn btn-primary btn-sm btn-block'])}}
              {!! Form::close() !!}
          </div>
        </div>


@endsection
