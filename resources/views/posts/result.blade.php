
 @extends('layouts.default')
@section('content')
 <!-- Results Of Search Form ---------------------------------------------------    -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <div class="col-md-7 pull-right dash">Dashboard</div>
                </div>
                <div class="card-body">
                    <h3 class="pos">Your Posts</h3>
                    <table class="table table-striped ">
                        <thead class="center">
                            <tr class="trpost">
                                <th>Title</th>
                                <th>Created</th>
                                <th>Body</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>{{str_limit(strip_tags($post->body),40)}}</td>
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