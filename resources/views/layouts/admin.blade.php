<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/switch.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin_custom.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
     <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            <a class="navbar-brand ml-3" href="{{ url('/accounts') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                     <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                    <?php
                        $users = Auth::user();
                        if ($users->user_type == 2) {
                           $user_type = "admin";
                        } elseif($users->user_type == 1){
                            $user_type = "librarian";
                        }else{$user_type = "standard";}
                    ?>
                            <a id="navbarDropdown" class="nav-link dropdown-toggle mt-4" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>({{$user_type}})
                                {{ Auth::user()->email  }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>

    </nav>
<div id="mySidenav" class="sidenav">
    <div class="sidenav_menu">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <br>
        <a class="nav-link ml-4 {{ Request::is('application') ? 'custom-red' : '' }}" href="{{ url('/application') }}">Application</a>
        <a class="nav-link ml-4 {{ Request::is('accounts') ? 'custom-red' : '' }}" href="{{ url('/accounts') }}">Account</a>
         <li class="dropdown">
            <a  class="nav-link ml-2 dropdown-toggle" href="" data-toggle="collapse" data-target="#manage">Manage</a>
            <div id="manage" class="collapse show">
                <a class="dropdown-item_side text-capitalize ml-2 {{ Request::is('authors') ? 'custom-red' : '' }}" id="link_author" href="{{ url('authors') }}" >
                    <i class="fas fa-user-tie mr-3"></i>Authors</a>
                <a class="dropdown-item_side text-capitalize ml-2 {{ Request::is('books') ? 'custom-red' : '' }}" href="{{ url('books') }}">
                    <i class="fas fa-book mr-3"></i>Books</a>
                <a class="dropdown-item_side text-capitalize ml-2 {{ Request::is('borrowers') ? 'custom-red' : '' }}" href="{{ url('borrowers') }}">
                    <i class="fas fa-book-reader mr-3"></i>Borrowers</a>
                <a class="dropdown-item_side text-capitalize ml-2 {{ Request::is('categories') ? 'custom-red' : '' }}" href="{{ url('categories') }}">
                    <i class="fas fa-layer-group mr-3"></i>Categories</a>
                <a class="dropdown-item_side text-capitalize ml-2 {{ Request::is('receives') ? 'custom-red' : '' }}" href="{{ url('receives') }}">
                    <i class="fas fa-undo-alt mr-3"></i>Returned</a>
                <a class="dropdown-item_side text-capitalize ml-2 {{ Request::is('publishers') ? 'custom-red' : '' }}" href="{{ url('publishers') }}">
                    <i class="fas fa-file-upload mr-3"></i>Publishers</a>
                <a class="dropdown-item_side text-capitalize ml-2 {{ Request::is('shelves') ? 'custom-red' : '' }}" href="{{ url('shelves') }}">
                    <i class="fas fa-archive mr-3"></i>Shelves</a>
                <a class="dropdown-item_side text-capitalize ml-2 {{ Request::is('users') ? 'custom-red' : '' }}" href="{{ url('users') }}">
                    <i class="fas fa-users mr-3"></i>Users</a>
            </div>
        </li>
        <li class="dropdown">
            <a  class="nav-link ml-2 dropdown-toggle" href="#" data-toggle="collapse" data-target="#side_colapse">Action</a>
            <div id="side_colapse" class="collapse show">
                <a class="dropdown-item_side text-capitalize ml-2 {{ Request::is('borrowers/create') ? 'custom-red' : '' }}" href="{{ url('borrowers/create') }}">
                    <i class="fas fa-share-square mr-3 "></i>Issue New Book</a>
                <a class="dropdown-item_side text-capitalize ml-2 {{ Request::is('return') ? 'custom-red' : '' }}" href="{{ url('return') }}">
                    <i class="fas fa-check-circle mr-3"></i>Return Book</a>
            </div>
        </li>
    </div>
</div>

<div id="main">
    <br>
    <br>
    <br>
    <br>
    @include('inc.message')
 @yield('content')
</div>

<script>
let screen = window.matchMedia("(max-width: 700px)")
let Status = 'open';
function openNav() {
     let navItem = document.querySelector(".sidenav_menu");

    if (Status == 'close' && screen.matches) {
            document.getElementById("mySidenav").style.width = "100%";
             navItem.style.display = 'block';
            Status = 'open';
        }
    else if(Status == 'close'){
            document.getElementById("mySidenav").style.width = "220px";
            document.getElementById("main").style.marginLeft = "220px";
             navItem.style.display = 'block';
            Status = 'open';
            }
    else if (Status == 'open' && screen.matches) {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            navItem.style.display = 'none';
            Status = 'close';
        }
    else{
        document.getElementById("mySidenav").style.width = "50px";
        document.getElementById("main").style.marginLeft= "50px";
        navItem.style.display = 'none';
        Status = 'close';
    }


    screen.addListener(openNav)
}
</script>

</body>
</html>
