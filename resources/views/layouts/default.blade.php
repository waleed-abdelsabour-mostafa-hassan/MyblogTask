<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name','My Site') }}</title>
   
 <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css')}} " rel="stylesheet">
	<script src="{{ asset('js/jquery.js')}} "></script>
    <script src="{{ asset('js/bootstrap.js')}} "></script>
    <!--<link rel="stylesheet" href="{{ asset('css/app.css') }}">-->
    <link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/flatly/bootstrap.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/extra.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
    <style>
	.navbar-brand{
	 font-size:1.5em;
	}
    .about{
        font-size:1.5em;
    }
    .contact{
        font-size:1.5em;
    }
    .posts{
        font-size:1.5em;
    }
    .nav2{
        font-size:1.4em;
        background-color:yellow;
    }
    .dash{
        font-size:1.5em;
    }
    .pos{
        padding:8px;
        border:2px dashed #efefef;
        border-radius:8px;
        text-align:center;
    }
    .trpost{
        border:2px dashed #efefef;
    }
    </style>
</head>
<body>
@include('elements.navbar')
<div class="container">
    @include('elements.flash')
    @yield('content');

</div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}} "></script>
</body>
</html>