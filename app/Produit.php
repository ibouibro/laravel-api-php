<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    //
    protected $table = 'produits';
    protected $fillable = [ 'nom', 'updated_at', 'created_at' ];
}
