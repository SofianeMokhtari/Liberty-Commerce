@extends('layouts.app')

@section('content')
    @if (Auth::user() == TRUE)
    <p style="color:red">{{Auth::user()->name}}</p>
    <a style="color:black; " href="/changeuser">Changer son nom d'utilisateur</a>
    <p style="color:red">{{Auth::user()->email}}</p>
    <a style="color:black; " href="/changeuser">Changer son adresse e-mail</a>
    @else
    <p style="color:red; font-size:25px; margin-top:10%;"> Vous n'êtes pas inscris !</p>
    @endif
    @endsection