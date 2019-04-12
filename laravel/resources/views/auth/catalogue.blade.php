@extends('layouts.app')
@section('content')


    <div class="categorie">
        <a class="catego" href="/catalogue"><input type="checkbox" name="same0" value="Tout"><label >Tout</label></a>

        <a class="catego" href="/catalogue/{{'Plante'}}"><input type="checkbox" name="same1" value="Plante"><label >Plante</label></a>

        <a class="catego" href="/catalogue/{{'Graine'}}"><input type="checkbox" name="same2" value="Graine">Graine</input></a>

        <a class="catego" href="/catalogue/{{'outils'}}"><input type="checkbox" name="same3" value="Outils">Outils</input></a>

        <a class="catego" href="/catalogue/{{'entretien'}}"><input type="checkbox" name="same4" value="Entretien">Entretien & Soin</input></a>

        <a class="catego" href="/catalogue/{{'jardin'}}"><input type="checkbox" name="same5" value="Aménagement">Aménagement de jardin</input></a>
    </div>
    <br>

    @foreach($catalogue as $c)

        <section style="margin-left:10%">
            <p>{{$c->titre}}</p>
            <img class ="imagecata"src="{{$c->image}}"></img>
            <p><strong>Prix : {{$c->prix}} €</strong></p><br/>

            @if ($c->disponibilité > 0)
                <p>Disponibilité : {{$c->disponibilité}}</p>

                <a href="/produit/{{$c->id}}"><button>Article</button></a>
@if (Auth::user() == TRUE)
                <a href="/panier/{{$c->id}}"><button type="button" name="achat" >Achat direct</button></a>
    @else
                    <a href="/panier/{{$c->id}}"><button disabled type="button" name="achat" >Achat direct</button></a>
                @endif
            @else
                <p>Pas de stock</p>
                <a href="/produit/{{$c->id}}"><button>Article</button></a>
                <a href="{{ url('panier')}}"><button disabled type="button" name="achat" >Achat direct</button></a>
            @endif



        </section>

    @endforeach

@endsection