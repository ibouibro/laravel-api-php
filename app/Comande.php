<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comande extends Model
{
    //

    protected $fillable = [
        'telephone', 'id_pub', 'addresse', 'date', 'nom_prenom', 'email' , 'etat'
    ];

    public function getPublication()
{
    return $this->belongsTo(App\publication::class);
}
}
