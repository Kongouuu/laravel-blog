<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        // Do not need to state 'table name', 'column name'
        // To overridde:  belongsToMany('App\Post','table_name','tag_id','post_id')
        return $this->belongsToMany('App\Post');
    }
}
