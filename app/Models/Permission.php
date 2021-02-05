<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded=['id'];

    public function group(){
        return $this->belongsTo('App\Models\Group');
    }
}
