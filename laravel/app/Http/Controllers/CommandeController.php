<?php

namespace App\Http\Controllers;

use App\Model\commande;
use App\Model\produit;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;	


class CommandeController extends Controller
{
	

    public function index() 
    {
    	if (Auth::user() == TRUE)
    	{
    	$id_user = Auth::user()->id;
    	
    	$liste2 = array();
    	$produits = array();
    	$liste = DB::select("select contenu from commande where id_user = '$id_user'");
    	$cart = DB::table("panier")->where('id_user', $id_user)->sum('choice');
    	$countcommande = DB::table("commande")->where('id_user', $id_user)->count();
    	$total = DB::select("SELECT * FROM commande WHERE id_user =$id_user");
}
else{
	return view('auth.login');
}
    	
    
    	if ($countcommande >= 1 ) {
    	foreach($liste as $tab) {
    		$liste2[] = unserialize($tab->contenu);
    	}
    	foreach($liste2 as $ok) {
    		foreach($ok as $v)
    		$produits[] = DB::select("SELECT * FROM produit where id=$v->id_produit");


    	}
   
    	return view('auth/commande3', ['liste2' => $liste2, 'produits' => $produits, 'cart' => $cart, 'total' => $total]);
    }
    else{
    	return redirect()->action('CommandeController@index2');
    }
    }

    public function index2()
	{
			return view('auth/commande2');
	}

    public function suppcommande()
    {
    	$id_user = Auth::user()->id;
    	commande::where('id_user',$id_user)->delete();

    	return redirect()->action('CommandeController@index');

    }

public function index3($id) 
    {
    	if (Auth::user() == TRUE)
    	{
    	$id_user = Auth::user()->id;
    	$liste2 = array();
    	$produits = array();
    	$liste = DB::select("select contenu from commande where id_user = '$id_user' AND id=$id");
    	$cart = DB::table("panier")->where('id_user', $id_user)->sum('choice');
    	$countcommande = DB::table("commande")->where('id_user', $id_user)->count();
    	$total = DB::select("SELECT * FROM commande WHERE id_user =$id_user");
}
    	else{
	return view('auth.login');
}
  
    
    	if ($countcommande >= 1 ) {
    	foreach($liste as $tab) {
    		$liste2[] = unserialize($tab->contenu);
    	}
    	foreach($liste2 as $ok) {
    		foreach($ok as $v)

    		$produits[] = DB::select("SELECT * FROM produit where id=$v->id_produit");
    	


    	}
   
    	return view('auth/commande', ['liste2' => $liste2, 'produits' => $produits, 'cart' => $cart, 'total' => $total, 'id' => $id]);
    }
    else{
    	return redirect()->action('CommandeController@index2');
    }
    }


}
