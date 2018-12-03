<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
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

</head>
<body>
    <div id="app">
        <div class="header_navbar" id="cover-photo">
            <div class="cover_text"><h3 class="text-capitalize font-weight-800 font-ghost ">So many books, so little time</h3></div>
        </div>

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" id="navbar_s">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/accounts') }}">
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
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/accounts') }}">Account</a>
                        </li>@endauth
                    @can('notStandard', Auth::user())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item text-capitalize" href="{{ url('borrowers/create') }}">Issue New Book</a>
                                <a class="dropdown-item text-capitalize" href="{{ url('return') }}">Return Book</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add New</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item text-capitalize" href="{{ url('books/create') }}">Add New Book</a>
                                <a class="dropdown-item text-capitalize" href="{{ url('authors/create') }}">Add New Author</a>
                                <a class="dropdown-item text-capitalize" href="{{ url('categories/create') }}">Add New Category</a>
                                <a class="dropdown-item text-capitalize" href="{{ url('shelves/create') }}">Add New Shelf</a>

                            </div>
                        </li>

                       <li class="nav-item">
                            <a class="nav-link" href="{{ url('/borrowers') }}">Manage</a>
                        </li>

                    @endcan
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
                               $user_type = "Admin";
                            } elseif($users->user_type == 1){
                                $user_type = "Librarian";
                            }else{$user_type = "Standard";}
                        ?>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><medium>{{$user_type}}</medium>|
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
            </div>
        </nav>

        <main class="py-4">
            <br>
            @include('inc.message')
            @yield('content')
        </main>
    </div>
</body>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar_s");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
</html>
