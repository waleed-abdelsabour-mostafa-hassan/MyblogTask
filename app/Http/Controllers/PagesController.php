<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
class PagesController extends Controller
{
    public function index()
    {
        $data='this is my website';
       // return view('pages.index')->with('data',$data);
      // return view('pages.index', ['data'=>$data] );
      return view('pages.index',compact('data'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function dosend(Request $request )
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'body'=>'required|min:10'
        ]);

        $name=$request->input('name');
        $email=$request->input('email');
        $subject=$request->input('subject');
        $body=$request->input('body');

        Mail::to('waleed.abd.elsabour.mostafa21@gmail.com')->send(new ContactUs($name,$email,$subject,$body));

        return redirect('/contact')->with('success','I got Your message and will answer your asap......psych!!!!');
    }
}
