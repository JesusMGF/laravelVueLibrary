<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function getBooks()
    {
        return $this->hasMany('App\Item', 'id', 'categorie_id');
    }
}
