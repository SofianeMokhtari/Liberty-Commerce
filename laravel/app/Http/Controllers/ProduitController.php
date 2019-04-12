<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\produit;
use DB;
use data;
use Auth;

class ProduitController extends Controller
{
    
    public function produitweb()
    {
        return view('auth/produit');
    }

    public function productaff($id)
    {
        $id_user = null;
    	$product = DB::select("select * from produit where id = '$id'");
            if (Auth::user() != null)
                $id_user = Auth::user()->id;
                $cart = DB::table("panier")->where('id_user', $id_user)->sum('choice');
                return view('auth/produit', ['product' => $product, 'cart' => $cart]);
    }

    public function test(Request $request)
    {
    	$id = $request->get('id');
    	$nb = $request->get('nb');
    	
		DB::update("update produit set disponibilité = '$nb' where id = '$id'");


    	return redirect()->action('ProduitController@productaff',$id);

    }



}

