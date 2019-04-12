@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="css/admin.css">

<div id="back">
    @foreach($util as $d)
    @if ($d->droit != 0)
    <p class="isadmin"> <strong>{{$d->name}}</strong> : Admin <a href="/update/{{$d->id}}"><button>Changer</button></a><a href="/suppuser/{{$d->id}}"><button>Supprimer</button></a></p>

    @else
    <p class="isadmin"> {{$d->name}} : Utilisateur <a href="/update/{{$d->id}}"><button>Changer</button></a><a href="/suppuser/{{$d->id}}"><button>Supprimer</button></a> </p>
        @endif
    @endforeach
</div>
@endsection