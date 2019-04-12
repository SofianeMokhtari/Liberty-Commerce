<?php

namespace App\Http\Controllers;

use Auth;
use App\Model\produit;
use Illuminate\Http\Request;
use DB;
use data;

class CatalogueController extends Controller
{
    public function addwebpage()
    {
        return view('auth/catalogue');
    }

    public function addwebpage2()
    {
        return view ('auth/catalogue2');
    }


    public function affd()
    {
        $id_user=null;
    	$catalogue = DB::select('select * FROM produit ');
    	if (Auth::user() != null)
            $id_user = Auth::user()->id;
        $cart = DB::table("panier")->where('id_user', $id_user)->sum('choice');
            return view('auth/catalogue', ['catalogue' => $catalogue, 'cart' => $cart]);


    }

 /*  public function modifdisp($disponibilité, $id)
    {   
    		$test = DB::select("select disponibilité from produit WHERE id = '$id'");
    		$test2 = $test[0]->disponibilité;
    

            DB::update("update produit SET disponibilité = '$test2' - 1 where id = '$id'");
            return redirect()->action('CatalogueController@affd');


    }*/

    public function categorienew($categorie)
    {
        $catalogue = DB::select("select * from produit where categorie = '$categorie'");
        if (Auth::user() != NULL) {
            $id_user = Auth::user()->id;
            $cart = DB::table("panier")->where('id_user', $id_user)->sum('choice');

            if ($catalogue == []) {
                return view('auth/catalogue2', ['catalogue' => $catalogue, 'cart' => $cart]);

            } else {
                return view('auth/catalogue', ['catalogue' => $catalogue, 'cart' => $cart]);
            }
        }
        else{
            return view('auth/catalogue', ['catalogue' => $catalogue]);
        }
    }
}
