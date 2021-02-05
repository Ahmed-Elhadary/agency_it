<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $guarded=['id'];

    public function task()
    {
        return $this->belongsTo('App\Admin\Task');
    }
}
