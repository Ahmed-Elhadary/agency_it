<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function group(){
        return $this->belongsTo('App\Models\Group');
    }

    public function task()
    {
        return $this->hasMany('App\Models\Task');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task','admin_id');
    }

    public function assigns()
    {
        return $this->hasMany('App\Models\Task','assign_id');
    }
}
