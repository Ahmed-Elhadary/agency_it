<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded=['id'];

    public function admins(){
        return $this->hasOne('App\Models\Group');
    }

    public function permission(){
        return $this->hasOne('App\Models\Permission');
    }
}
