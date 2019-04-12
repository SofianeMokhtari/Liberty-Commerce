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

        <section style="margin-left:40%; margin-top:4%;">

        <div id="search"><h4 style="color:white;">   Aucun résultat pour cette catégorie.  </h4></div>
        </section>


@endsection