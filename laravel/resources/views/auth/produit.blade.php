@extends('layouts.app')

@section('content')
@if ( Auth::user() != NULL)
    @if(empty($product) && empty($cart))
        Pas de produit !
    @else

    @foreach($product as $pro)
<div class="td1">

    <img class="ima" src="{{$pro->image}}" >
    <h1 id="hun">{{$pro->titre}}   </h1>
    <p class="cate">{{$pro->categorie}}</p>

    @if (Auth::user()->droit == 0 && $pro->disponibilité > 0)
    <p class="dispo"> Disponibilité : {{$pro->disponibilité}}</p>
    <p class="othershit">{{$pro->prix}} €<br></p>

        @elseif (Auth::user()->droit > 0 && $pro->disponibilité > 0)

         <p class="dispo"> Disponibilité : {{$pro->disponibilité}}</p>
         <div class="quant">
<form action="{{action('ProduitController@test')}}" method="POST" id="nbnb">

    {{csrf_field()}}

    <input type="hidden" name="id" value="{{$pro->id}}">
    <input class="quantity" type="number" name="nb" min="0" max="99">
    <button type="submit"  value="creere"> Modifier </button>

</form>

    </div>
    @elseif (Auth::user()->droit > 0 && $pro->disponibilité <= 0)
    <p class="dispo"> Plus disponible</p>
    <div class="quant">

<form action="{{action('ProduitController@test')}}" method="POST" id="nbnb">

    {{csrf_field()}}

    <input type="hidden" name="id" value="{{$pro->id}} ">
    <input class="quantity" type="number" name="nb" min="0" max="99">
    <button type="submit"  value="creere"> Modifier </button>

</form>

    </div>
    @elseif(Auth::user()->droit == 0&& $pro->disponibilité <= 0)
    
    <p class="dispo"> Plus disponible</p>
    <p class="othershit">{{$pro->prix}} €<br></p>

@endif

    <p class="prix">{{$pro->prix}} €<br></p>
    <p class="desc"><br> {{$pro->description}} </p>
    @if ($pro->disponibilité > 0)
        <a href="/panier2/{{$pro->id}}"><button type="button" id="buybuy2" name="achat" >Ajouter au panier</button></a>
    @else
        <a href="{{ url('catalogue')}}"><button disabled type="button" id="buybuy2" name="achat" >Ajouter au panier</button></a>

     @endif
</div>

    @endforeach
    @endif
    @endif
    @endsection
