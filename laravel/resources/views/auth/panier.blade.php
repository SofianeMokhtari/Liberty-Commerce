@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/panier.css') }}" rel="stylesheet">
<?php $total = 0; $quantitetotal = 0; ?>
    @foreach($paniers as $elem)

        @if (Auth::user()->id == $elem->id_user)

            @foreach($elem->produit as $tab)
                <section class="panierb">
                    <h2><img class="panierimage" src="{{$tab->image}}"><div id="textpanier"> {{$tab->titre}} | Prix : {{$tab->prix * $elem->choice }} € | Disponible : {{$tab->disponibilité}} | Quantité choisie : {{$elem->choice}} |  </div></h2>

                    <form action="{{action('PanierController@quantity')}}" method="POST" id="quantiter">
                    {{csrf_field()}}

                <input type="hidden" name="id" value=" {{$elem->id}}">
                        <input style="width:40px;" type="number" name="quantity" min="1" max="{{$tab->disponibilité}}" value="1">
                <button type="submit" id="addquantity" value="creere"> Valider </button>
                    </form>
                    <a href="/sup/{{$tab->id}}"><br/><button id="deletecommande" style="margin-left:0%;">Supprimer l'article</button></a>
                <?php $total += $tab->prix * $elem->choice; $quantitetotal += $elem->choice ?>
                    </section>
            @endforeach
        @endif
    @endforeach
<br/>
<div class="centerbuy">
<?php echo 'Total : ' .$total. '€'; ?>
@if(!empty($cart))
    <a href="/acheter/{{$elem->id_produit}}/{{$total}}"><button id="buybuy">Acheter</button></a>

    @endif
</div>
@endsection

 