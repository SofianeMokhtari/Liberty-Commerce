<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GreatGarden</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->

    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/catalogue.css') }}" rel="stylesheet">
    <link href="{{ asset('css/produit.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                
               

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                        <li class="nav-item-menu"> <a href="{{ url('catalogue') }}">{{__('Catalogue') }}</a></li>
                        <li class="nav-item-menu"> <a href="{{ url('panier') }}">{{__('Panier') }}</a></li>

                            <li class="nav-item-menu">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                            </li>
                            <li class="nav-item-menu">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __("S'inscrire") }}</a>
                                @endif
                            </li>

                        @else

                        <li class="nav-item-menu"> <a href="{{ url('catalogue') }}">{{__('Catalogue') }}</a></li>

                            @if(Auth::user() != null)
                                <li class="nav-item-menu"><a href="{{url('panier')}}"><img src="http://www.lavalleedelalune.fr/wp-content/uploads/2015/05/petit-panier.png" id="pan" style="position: absolute;margin-left: 20px;">
                                            @if(!empty($cart)){{$cart}} @endif</img></a></li>

                            @endif
                        <li class="nav-item-menu"><a href="{{ url('panier') }}">{{__('Panier') }}</a></li>
                            <li class="nav-item-menu"> <a href="{{ url('commande') }}">{{__('Commande') }}</a></li>
                            <li class="nav-item-menu"> <a href="{{ url('user') }}">{{__('Profil') }}</a></li>

                        @if (Auth::user()->droit != 0)
                             <li class="nav-item-menu"> <a href="{{url('admin')}}">{{__('admin') }}</a></li>
                        @endif

                        @if (Auth::user()->droit == 2)
                         <li class="nav-item-menu"> <a href="{{url('isAdmin')}}">{{__('Administration') }}</a></li>
                        @endif

                            <li class="nav-item dropdown">
                                

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <p id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <strong>Bonjour {{ Auth::user()->name }}</strong> <span class="caret"></span>
                                </p>

                                    <a class="logout" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <div id="test">    {{ __('Se déconnecter') }}</div>
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
            @yield('content')
        </main>
    </div>
    
</body>
<footer>
<div class="footer">
      <p>&copy; Copyright 2018 - Tous droits réservés</br>
        <a href="#"><img class="image" src="../css/img/facebook.png"></img></a>
        <a href="#"><img class="image" src="../css/img/twitter.png"></img></a>
    </p>
    </div>
</footer>
</html>
