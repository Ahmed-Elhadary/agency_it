<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Group;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GroupsService extends Controller
{
    public function groups()
    {
        $group = Group::all();
        return DataTables::of($group)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('name', function($group){
                return $group->name;
            })
            ->addColumn('action', function($group){
                return '<a onclick="editForm('. $group->id .')" class="btn btn-primary btn-xs text-white m-1"><i class="fa fa-edit"></i> </a>' .
                    '<a onclick="deleteData('. $group->id .')" class="btn btn-danger btn-xs text-white m-1"><i class="fa fa-trash"></i> </a>'.
                    '<a href="'. route('permissions.create',$group->id) .'" class="btn btn-danger btn-xs text-white m-1 "><i class="fa fa-cogs pr-2"></i>'.__('lang.permission').'</a>';
            })

            ->rawColumns(['name','idn', 'action'])->make(true);
    }
}
