<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Since plural of category is NOT categories
    // Has to rename to tell the model which table
    protected $table = 'categories';

    // Create relation
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
