<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    // admin login get
    public function get()
    {
        return view('admin.admins.login');
    }
    // admin login post
    public function post()
    {
        if (auth('admin')->attempt(['email' => request('email'), 'password' => request('password')])) {
            return redirect('/admin/index');
        } else {
            return back();
        }
    }
    // admin logout
    public function logout(Request $request)
    {

        auth('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->guest(url('/admin/login'));
    }
    // admin index home page
    public function home()
    {
        return view('admin.index');
    }
    public function index()
    {
        return view('admin.admins.index');
    }
    public function edit($id)
    {
        return Admin::findOrFail($id);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:admins',
            'group_id' => 'required',
        ]);
        if ($validator->passes()) {
            $admin = Admin::create([
                'group_id' => $request->group_id,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('password')
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
        $admin = Admin::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'group_id' => 'required',
        ]);
        if ($validator->passes()) {

            $admin->update([
                'group_id' => $request->group_id,
                'name' => $request->name,
                'email' => $request->email
            ]);

            return response()->json([
                'success' => true,
                'message' => __('lang.edit')
            ]);
        }
        return response()->json(['errors' => $validator->errors()]);
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return response()->json([
            'message' => __('lang.deleted'),
            'type'   => 'success'
        ]);
    }
}
