<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupsController extends Controller
{
    public function index()
    {
        if(auth('admin')->user()->group->permission->super == 1){
            return view('admin.groups.index');
        }
        return  redirect()->back();

    }
    public function edit($id)
    {
        return Group::findOrFail($id);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->passes()) {
            $group = Group::create([
                'name' => $request->name,
            ]);

            return response()->json([
                'success' => 1,
                'message' => __('lang.added'),
                'type'  => 'success'
            ]);
        }
        return response()->json(['errors' => $validator->errors()]);
    }

    public function update(Request $request, $id)
    {
        $group = Group::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->passes()) {

            $group->update([
                'name' => $request->name,
            ]);

            return response()->json([
                'success' => true,
                'message' => __('lang.edited')
            ]);
        }
        return response()->json(['errors' => $validator->errors()]);
    }

    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();

        return response()->json([
            'message' => __('lang.deleted'),
            'type'   => 'success'
        ]);
    }
}
