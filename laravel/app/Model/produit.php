<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    protected $table = 'produit';

    public function panier()
    {
        return $this->hasMany('App\Model\panier');
    }
}
