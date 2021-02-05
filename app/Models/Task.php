<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded=['id'];

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function assigned()
    {
        return $this->belongsTo('App\Models\Admin','assign_id');
    }

    public function attachment()
    {
        return $this->belongsTo('App\Models\Attachment');
    }
    protected $appends = ['typeLabel','priorityLabel','statusLabel'];
    public function getStatusLabelAttribute()
    {
        if ($this->status == 'open') {
            return '<span class="badge badge-primary label-inline mt-1">' . __('lang.open') . '</span>';
        }

        if ($this->status == 'close') {
            return '<span class="badge badge-info label-inline mt-1">' . __('lang.close') . '</span>';
        }
    }
    public function getTypeLabelAttribute()
    {
        if ($this->type == 'created') {
            return '<span class="badge badge-primary label-inline mt-1">'.__('lang.created').'</span>';
        }

        if ($this->type == 'ongoing') {
            return '<span class="badge badge-info">'.__('lang.ongoing').'</span>';
        }

        if ($this->type == 'testing') {
            return '<span class="badge badge-warning">'.__('lang.testing').'</span>';
        }

        if ($this->type == 'finished') {
            return '<span class="badge badge-success">'.__('lang.finished').'</span>';
        }
    }

    public function getPriorityLabelAttribute()
    {
        if ($this->priority == 'low') {
            return '<span class="badge badge-primary">'.__('lang.low').'</span>';
        }

        if ($this->priority == 'high') {
            return '<span class="badge badge-warning">'.__('lang.high').'</span>';
        }

        if ($this->priority == 'emergency') {
            return '<span class="badge badge-danger">'.__('lang.emergency').'</span>';
        }

        if ($this->priority == 'ordinary') {
            return '<span class="badge badge-dark">'.__('lang.ordinary').'</span>';
        }
    }

}
