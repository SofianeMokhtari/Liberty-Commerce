<?php

namespace App\Http\Controllers;

use App\Model\produit;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;	

class AdminController extends Controller
{
      public function index()
    {

        return view('auth/passwords/admin');


    }

       public function ajout(Request $request)
    {

            $produit = new produit();

            $produit->titre = $request->get('titre');
            $produit->image = $request->get('image');
            $produit->description = $request->get('description');
            $produit->disponibilité = $request->get('disponibilité');
            $produit->prix = $request->get('prix');
            $produit->categorie = $request->get('categorie');

            $produit->save();

            return redirect()->action('AdminController@ajout');

    }

        public function affdata()
    {

        if (Auth::user() != NULL) {
            $UserM = Auth::user()->droit;
            if ($UserM >= 1) {
                $produit = DB::select('select * FROM produit');
                $id_user = Auth::user()->id;
                $cart = DB::table("panier")->where('id_user', $id_user)->sum('choice');

                return view('auth/passwords/admin', ['produit' => $produit, 'cart' => $cart]);
            }
            elseif($UserM == 0) {
                return redirect()->action('CatalogueController@affd');
            }
        }
        else{
            return redirect()->action('HomeController@index');
        }

    }

    public function suppdata($id)
    {
        DB::table('panier')->where('id_produit',$id)->delete();
        DB::table('produit')->where('id',$id)->delete();
               return redirect()->action('AdminController@ajout');

    }

    public function suppuser($id)
    {
        User::where('id',$id)->delete();
            return redirect()->action('AdminController@isAdmin');
    }

    public function changeAdmin($id)
{
   $test = DB::select("select droit FROM users WHERE id = '$id'");
   
   if ($test[0]->droit == "1") {

      DB::update("update users SET droit = '0' where id = '$id'");
      return redirect()->action('AdminController@isAdmin');
   }  

   else {
      DB::update("update users SET droit = '1' where id = '$id'");
      return redirect()->action('AdminController@isAdmin');
   }
}
public function isAdmin()
{

   if (Auth::user() != NULL) {
       $UserM = Auth::user()->droit;
       if ($UserM == 2) {
           $util = DB::select('select * FROM users WHERE droit<="1"');
           $id_user = Auth::user()->id;
           $cart = DB::table("panier")->where('id_user', $id_user)->sum('choice');
           return view('isAdmin', ['util' => $util, 'cart' => $cart]);
       } elseif ($UserM <= 1) {
           return redirect()->action('CatalogueController@affd');
       }
   }
   else {
       return redirect()->action('HomeController@index');
   }
}
}

