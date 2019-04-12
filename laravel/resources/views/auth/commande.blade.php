@extends('layouts.app')
@section('content')
    <?php $i = 0; ?>



    @foreach($produits as $produit)

        <section class="commande">


            <img class="comand" src="{{$produit[0]->image}}"> <br/>
            <p> -------------------- </p>
            Titre : {{$produit[0]->titre}} <br/>
            <p> -------------------- </p>

        </section>

        <br/>
    @endforeach
    @foreach ($total as $prix_total)
@if ($prix_total->id == $id)
        Prix total de la commande : {{$prix_total->prix_total}}
    @endif
    @endforeach

    <br/>


@endsection