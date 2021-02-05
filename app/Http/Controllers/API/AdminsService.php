<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminsService extends Controller
{
    protected $id;
    public function admins($id)
    {
        $this->id = $id;
        $admin = Admin::all();
        return DataTables::of($admin)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('name', function($admin){
                return $admin->name;
            })
            ->addColumn('group', function($admin){
                return $admin->group->name;
            })
            ->addColumn('email', function($admin){
                return $admin->email;
            })

            ->addColumn('action', function($admin){
                if($this->id == $admin->id){
                    return '<span class="badge badge-dark p-1">'.__('lang.loggedIn').' </span>';
                }else{
                    return '<a onclick="editForm('. $admin->id .')" class="btn btn-primary btn-xs text-white m-1"><i class="fa fa-edit"></i> </a>' .
                        '<a onclick="deleteData('. $admin->id .')" class="btn btn-danger btn-xs text-white m-1"><i class="fa fa-trash"></i> </a>';

                }
            })

            ->rawColumns(['name','group','email','idn', 'action'])->make(true);
    }
}
