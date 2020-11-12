@extends('layouts.default')
@section('content')
  @if($posts->count() > 0)
  @foreach($posts as $post)
<div class="panel">
   <div class="panel-heading">
    <h3>
      <a href="posts/{{$post->slug}}">
          {{$post->title}}
      </a>
    </h3>
   </div>
   <div class="panel-body">
      {{str_limit(strip_tags($post->body),50)}}
   </div>
    <div class="panel-footer">
      <span class="label label-info">
         <li class="fas fa-calendar"></li>{{$post->created_at}}
      </span>
        &nbsp;
        <span class="label label-primary">
         <li class="fas fa-user"></li>{{$post->user->name}}
      </span>
    </div>
</div> 
 @endforeach
{{ $posts->links() }}

@else
 <div class="alert alert-info">
    <strong>Oops</strong> No posts
 </div>
 @endif
@endsection