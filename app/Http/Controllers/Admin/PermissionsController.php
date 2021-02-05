<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function create($groupId)
    {
        $data=[
            'group_id'  => $groupId
        ];
        $group = Permission::firstOrCreate($data,$data );

        return view('admin.groups.permissions',[
            'groupId'  =>$groupId,
            'group'  =>$group,
        ]);
    }

    public function store(Request $request)
    {
        $data=[
            'task_add' => $request->has('task_add') ? 1 :0,
            'task_edit' => $request->has('task_edit') ? 1 :0,
            'task_assign' => $request->has('task_assign') ? 1 :0,
            'task_delete' => $request->has('task_delete') ? 1 :0,
            'task_open' => $request->has('task_open') ? 1 :0,
            'task_close' => $request->has('task_close') ? 1 :0,
            'task_reopen' => $request->has('task_reopen') ? 1 :0,
            'super' => $request->has('super') ? 1 :0,
        ];
        $data = Permission::find($request->group_id)->update($data);
        return response()->json([
            'message' => __('lang.edited'),
            'type'   => 'success'
        ]);
    }
}
