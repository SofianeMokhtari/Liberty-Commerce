<?php

namespace App\Http\Controllers;

use App\Model\commande;
use App\Model\produit;
use Illuminate\Support\Facades\DB;
use App\Model\panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    public function index($id)
    {
        if(Auth::user() == TRUE) {
            $test = Auth::user()->id;

            $tout = DB::select("select * from panier");

            $nb_produit = DB::select("select disponibilité from produit where id = '$id'");
            $prix = DB::select("select prix from produit where id = '$id'");


            foreach ($tout as $verifie) {

                if ($test == $verifie->id_user && $id == $verifie->id_produit) {
                    if ($verifie->choice < $verifie->nombre)
                        DB::update("update panier set choice = '$verifie->choice' + 1 where id_produit = '$id' and id_user = '$test'");
                    return redirect()->action('PanierController@see');
                }
            }

            $elem = new panier();

            $elem->id_produit = $id;
            $elem->prix = $prix[0]->prix;
            $elem->id_user = $test;
            $elem->nombre = $nb_produit[0]->disponibilité;


            $elem->save();
        }
        else {
            return redirect()->action('CatalogueController@affd');
        }

        return redirect()->action('PanierController@see');
    }

    public function index2($id)
    {
        $test = Auth::user()->id;

        $tout = DB::select("select * from panier");

        $nb_produit = DB::select("select disponibilité from produit where id = '$id'" );
        $prix = DB::select("select prix from produit where id = '$id'" );

        foreach ($tout as $verifie) {
            if ($test == $verifie->id_user && $id == $verifie->id_produit) {
                if ($verifie->choice < $verifie->nombre)
                DB::update("update panier set choice = '$verifie->choice' + 1 where id_produit = '$id' and id_user = '$test'");
                return redirect()->action('ProduitController@productaff', $id);
            }
        }

        $elem = new panier();

        $elem->id_produit = $id;
        $elem->prix = $prix[0]->prix;
        $elem->id_user = $test;
        $elem->nombre = $nb_produit[0]->disponibilité;


        $elem->save();

        return redirect()->action('ProduitController@productaff', $id);
    }


    public function see()
    {
        if (Auth::user() != NULL) {
            $id_userr = Auth::user()->id;
            $paniers = new panier();
            $panier = $paniers->all();
            $total = 0;
            $compter = DB::select("select choice from panier where id_user='$id_userr'");
            $nombreproduit = DB::table('panier')->where('id_user', $id_userr)->count();



            if ($nombreproduit >= 1) {
                $id_user = Auth::user()->id;
                $cart = DB::table("panier")->where('id_user', $id_user)->sum('choice');
                return view('auth.panier', ['cart' => $cart])->withPaniers($panier);
            } else {

                return view('auth.panier2');
            }
        }
        else {
            return view('auth/login');
        }
    }

    public function suppanier($id)
    {

        panier::where('id_produit',$id)->delete();
        return redirect()->action('PanierController@see');
    }

    public function acheter($id_product, $total)
    {

        $id_user = Auth::user()->id;

        $panier = Auth::user()->panier()->get();


        $tab = DB::select("SELECT * FROM panier WHERE id_user='$id_user'");
        //$prix = DB::select("SELECT * FROM panier WHERE id_user='$id_user'");

        $commande = new commande();

        $commande->id_user = $id_user;
        $commande->contenu = serialize($tab);
        $commande->prix_total= $total;

        $commande->save();

        foreach ($panier as $elem) {

            $elem->nombre = $elem->nombre - $elem->choice;
            $elem->save();
            $a = produit::find($elem->id_produit);
            $a->disponibilité = $elem->nombre;

            $a->update();

            panier::where('id_user',$id_user)->delete();
        }


        return redirect()->action('CatalogueController@affd');
    }


    public function quantity(Request $request)
    {

        $id = $request->get('id');

        $nb = $request->get('quantity');

        DB::update("update panier set choice = '$nb' where id = '$id'");


        return redirect()->action('PanierController@see');
    }

}