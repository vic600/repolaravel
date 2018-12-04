@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a  class="btn btn-dark btn-sm" href="/posts/create" role="button">New Post</a>

                </div>
                @if (count($posts) >0)
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                    <td scope="row">{{$post->title}}</td>
                                    <td><a class="btn btn-sm btn-info" href="/posts/{{$post->id}}/edit" role="button"> <i class="fa fa-edit ">Edit</i></a></td>
                                    <td>{!!Form::open(['action'=>['PostsController@destroy',$post->id],'method','POST','class'=>'pull-right'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class'=>'btn btn-sm btn-danger'])}}
                                    {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                </table>
                @else
                    <div class="alert alert-info" role="alert">
                        <strong>You have no Posts</strong>
                    </div>
                @endif
            </div>
        </div>

    </div>

    </div>

@endsection
