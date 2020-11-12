<?php

namespace App\Http\Controllers\Api;
use App\Http\controllers\Controller;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use App\Http\Resources\PostResource;
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','show']]);
    }

    public function index()
    {
        $posts=Post::orderby('created_at','DESC')->paginate(2);

        return PostResource::collection($posts);
    }
    public function store(Request $request)
    {

        //simple validation
        $request->validate([
            'title'=>'bail|required|min:3',
            'body'=>'required'
        ]);
        $post = new Post();
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $now=date('Y-m-d-H-i-s');
        $post->slug=str_replace(' ','-',strtolower($post->title)).'-'.$now;
        $post->user_id=auth('api')->user()->id;
        $post->save();
        return new PostResource($post);
    }

    public function show($slug)
    {
        $post=Post::where('slug',$slug)->firstOrFail();
        return new PostResource($post);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'bail|required|min:3',
            'body'=>'required'
        ]);
        $post =Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        //Current User Id
       /* $userId=Auth::id();
        if ($post->user_id !== $userId)
        {
            return redirect('/posts')->with('error','That Is Not Your Post Please!!!!');
        }*/
        $post->save();
        return new PostResource($post);
    }
    public function destroy($id)
    {
        $post =Post::find($id);
        //Current User Id
        /*$userId=Auth::id();
        if ($post->user_id !== $userId)
        {
            return redirect('/posts')->with('error','That Is Not Your Post Please!!!!');
        }*/
        $post->delete();
        return response()->json(nulll,204);
    }
}
