<nav class="navbar navbar-default navbar-expand-md navbar-light bg-white shadow-sm" role="navigation">
<div class="container">
<div class="navbar-header">
 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" >
 <span class="sr-only"> Toggle Navigation</span>
 <span class="icon-bar"> </span>
 <span class="icon-bar"> </span>
 <span class="icon-bar"> </span>
 </button>
 <a class="navbar-brand" href="{{route('indexpages')}}">My Blog </a>
</div>

<div class="collapse navbar-collapse navbar-ex1-collapse ">
    <ul class="nav navbar-nav">
            <li><a href="{{route('Posts.index')}}" class="posts">Posts</a></li>
            <li><a href="{{route('aboutpages')}}" class="about">About</a></li>
            <li><a href="{{route('contactpages')}}" class="contact">Contact</a></li>

    </ul>
     <!-- Right Side Of Navbar -->
     <ul class="navbar-nav ml-auto pull-right nav2">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <ul>
                                        <li>
                                            <a href="createPost">
                                                <i class="fa fa-plus"></i>Write Post
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('home')}}">
                                                <i class="fa fa-gear"></i>Admin
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                   <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
</div>
</div>
</nav>
