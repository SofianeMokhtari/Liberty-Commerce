@extends('layouts.app')
@section('content')

@foreach ($total as $prix_total)


   <a href="/commande/{{$prix_total->id}}/"><p style="color:red;">Commande : {{$prix_total->id}}</p></a>
@endforeach
<a href="/suppcommande/"><button id="deletecommande">Vider l'historique de commande<br><img id="delet" src="http://icons-for-free.com/free-icons/png/512/1312512.png"></button></a>

@endsection