@extends('layouts.default')
@section('content')

<h1>Contact Us</h1>
      {!! Form::open(['action' => 'PagesController@dosend','method'=>'POST']) !!}
            
            <div class="form-group">
                {{Form::label('Name')}}
                {{Form::text('name','',['placeholder'=>'Enter Your Name ','class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('Email')}}
                {{Form::text('email','',['placeholder'=>'Enter Your Email ','class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('Subject')}}
                {{Form::text('subject','',['placeholder'=>'Enter Your subject ','class'=>'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('Body')}}
                {{Form::textarea('body','',['placeholder'=>'Enter Message','class'=>'form-control'])}}
            </div>
            
            <div class="form-group pull-right">
                {{Form::submit('Send Message',['class'=>'btn btn-primary'])}}
            </div>
        {!! Form::close() !!}
@endsection