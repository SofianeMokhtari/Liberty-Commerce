@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="css/admin2.css">

<form action="{{action('AdminController@ajout')}}" method="POST" id="produitCreateForm">

<div class="login">

    {{csrf_field()}}
<h1 id="titlee"> Ajouter un produit </h1>
    
            <label>Titre<input type="text" name="titre" /><br/></label>

            <label>Categorie<input type="text" name="categorie"/><br/></label>

            <label>Prix<input type="text" name="prix"  /><br/></label>

            <label>Disponibilité<input type="number" name="disponibilité"  /><br/></label>

            <label> Description<textarea name="description" ></textarea><br/></label>

            <label>Image<input type="text" name="image"/><br/></label>
        
<br>
            <button type="submit" value="creer" > Ajouter</button>

</div>
</form>
<br><br>
<table>
    <tr>
        <th>Titre du produit</th>
        <th>Catégorie</th>
    </tr>
    @foreach($produit as $d)
    <tr>
        <td>{{$d->titre}}</td>
        <td>{{$d->categorie}}</td>
    
        <td>
            <a href="/delete/{{$d->id}}"><button>Delete</button></a>
        </td>
    </tr>
    

    @endforeach
</table>
@endsection
