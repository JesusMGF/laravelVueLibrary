<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function getCategory()
    {
        return $this->hasMany('App\Categorie', 'categorie_id', 'id');
    }
}
