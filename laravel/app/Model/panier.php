<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class panier extends Model
{
    protected $table = 'panier';


    public function produit()
    {
        return $this->hasMany('App\Model\produit', 'id', 'id_produit');
    }

    public function user()
    {
        return $this->hasMany('App\User', 'id', 'id_user');
    }

}