<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class PostsController extends Controller
{
    public function __construct()
    {
        //Every request need to be authenticated
        // $this->middleware('auth');
        //only
        //$this->middleware('auth',['only'=>['show']]);
        //Except
        $this->middleware('auth',['except'=>['index','show']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderby('created_at','DESC')->paginate(2);

        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }
        //Function Search
    public function search(Request $request)
    {
        $search=$request->get('search');
        $posts=DB::table('posts')->where('title','like','%'.$search.'%')
        ->orWhere('body','like','%'.$search.'%')->get();
        return view('posts.result',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Access request data
        //$PostTitle = $request->input('title');
        //return $PostTitle;
        //simple validation
        $request->validate([
            'title'=>'bail|required|min:3',
            'body'=>'required'
        ]);
        $user=Auth::user();
        $post = new Post();
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $now=date('Y-m-d-H-i-s');
        $post->slug=str_replace(' ','-',strtolower($post->title)).'-'.$now;
        $post->user_id=$user->id;
        $post->save();
        return redirect('/posts')->with('success','Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post=Post::where('slug',$slug)->first();
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        //Current User Id
        $userId=Auth::id();
        if ($post->user_id !== $userId)
        {
            return redirect('/posts')->with('error','That Is Not Your Post Please!!!!');
        }
        return view('posts.edit',compact('post')); 
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $userId=Auth::id();
        if ($post->user_id !== $userId)
        {
            return redirect('/posts')->with('error','That Is Not Your Post Please!!!!');
        }
        $post->save();
        return redirect('/posts/'.$post->slug)->with('success','Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::find($id);
        //Current User Id
        $userId=Auth::id();
        if ($post->user_id !== $userId)
        {
            return redirect('/posts')->with('error','That Is Not Your Post Please!!!!');
        }
        $post->delete();
        return redirect('/posts')->with('success','Post Deleted Successfully');
    }
}
