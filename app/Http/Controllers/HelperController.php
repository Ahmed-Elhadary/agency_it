<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public static function hasAdd($groupId,$table){
        $column = $table.'_add';
        $permission = Permission::where('group_id',$groupId)->get()->first();
        return $permission->$column == 0 ? false : true;
    }

    public static function hasEdit($groupId,$table){
        $column = $table.'_edit';
        $permission = Permission::where('group_id',$groupId)->get()->first();
        return $permission->$column == 0 ? false : true;
    }

    public static function hasShow($groupId,$table){
        $column = $table.'_show';
        $permission = Permission::where('group_id',$groupId)->get()->first();
        return $permission->$column == 0 ? false : true;
    }

    public static function hasDelete($groupId,$table){
        $column = $table.'_delete';
        $permission = Permission::where('group_id',$groupId)->get()->first();
        return $permission->$column == 0 ? false : true;
    }
}
