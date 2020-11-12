@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                <div class="col-md-3">Dashboard</div>
               <!-- Search Form ---------------------------------------------------    -->
                <div class="col-md-7"> 
                    <form action="{{route('posts.search')}}" method="POST" >
                    {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search"
                            placeholder="Search users">
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                </form>
                </div>
              <!-- End Search Form ---------------------------------------------------    -->
                <div class="btn-group pull-right">
                    <a href="createPost" class="btn btn-default btn-sm" >
                        <i class="fas fa-plus"></i>New Post
                    </a>
                </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Your Posts</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Created</th>
                                <th>Body</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>
                                {{str_limit(strip_tags($post->body),40)}}                                </td>
                                <td>
                                <a href="{{route('Posts.edit',$post->id)}}" class="btn btn-info btn-sm">
                                <li class="fa fa-edit"></li> Edit Post
                                </a>
                                </td>
                                <td>
                                {!! Form::open(['action' => ['PostsController@destroy',$post->id],'method'=>'POST']) !!}
                                {{ Form::hidden('_method','DELETE')  }}
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        Delete Post
                                    </button>
                                {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
