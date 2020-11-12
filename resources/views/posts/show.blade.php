@extends('layouts.default')
@section('content')
    <h1>{{$post->title}}</h1>
    @if(!Auth::guest() && (Auth::user()->id == $post->user_id))
    <div class="clearfix">
    <a href="{{route('Posts.edit',$post->id)}}" class="btn btn-default">
    <li class="fa fa-edit"></li> Edit Post
    </a>
    <div class="pull-right">
    {!! Form::open(['action' => ['PostsController@destroy',$post->id],'method'=>'POST']) !!}
    {{ Form::hidden('_method','DELETE')  }}
        <button class="btn btn-danger" type="submit">
            Delete Post
        </button>
    {!! Form::close() !!}
    </div>
    </div>
    @endif
    <hr />
    <div>
         {{$post->body}}
    </div>
    <hr />
    <h4>Comments : {{$post->comments->count()}}</h4>
        <!-- Comments List -->
        <ul class="comments">
        @foreach($post->comments as $comment)
        <li class="comment">
            <div class="clearfix">
                <h4 class="pull-left">{{ $comment->user->name }}</h4>
                <p class="pull-right">{{ $comment->created_at->format('d M Y') }}</p>
            </div>
            <p>{{$comment->body }}</p>
        </li>
        @endforeach
        </ul>
        <!-- Comments List -->
    <!-- Comments Form -->
    <div class="panel panel-default">
        <div class="panel-heading">Add Your Comment</div>
        <div class="panel-body">
        @guest
         <div class="alert alert-info">Please Login To Comment</div>
         @else
            <form action="{{ route('comments.store',$post->slug) }}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="Comment">Comment</label>
                    <textarea name="body" class="form-control" placeholder="Enter Your Comment" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
            @endguest
        </div>
    </div>
        <!-- Comments Form -->

@endsection