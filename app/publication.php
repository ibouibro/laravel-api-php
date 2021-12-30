<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publication extends Model
{
    //

    
    protected $fillable = [
        'prix', 'description', 'image', 'date'
    ];
    
}
