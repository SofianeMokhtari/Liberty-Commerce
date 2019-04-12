@extends('layouts.app')
@section('content')


    <form action="{{action('UserController@changeuser')}}" method="get">
        {{csrf_field()}}
      <i> Changer son nom d'utilisateur : </i>  <input type="text" name="username"><br/>
        <i> Changer son adresse de livraison : </i>  <input type="text" name="mail"><br/>
        <i> Changer son numéro de téléphone : </i>  <input type="text" name="tel"><br/>
        <button type="submit"  value="creere"> Modifier </button>
    </form>

    @endsection