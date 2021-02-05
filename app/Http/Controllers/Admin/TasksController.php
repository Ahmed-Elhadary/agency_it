<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AlertAssignEmail;
use App\Models\Admin;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Mail;
class TasksController extends Controller
{
    public function index()
    {
        $day = now();
        $admins = Admin::all();
        $today = date("Y-m-d",strtotime($day));
        return view('admin.tasks.index',[
            'today'    =>$today,
            'admins'    =>$admins
        ]);
    }
    public function edit($id)
    {
        return Task::findOrFail($id);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'assign_id' => 'required',
            'admin_id' => 'required',
            'due_date' => 'required|date',
        ]);
        if ($validator->passes()) {
            $task = Task::create([
                'name' => $request->name,
                'description' => $request->description,
                'assign_id' => $request->assign_id,
                'admin_id' => $request->admin_id,
                'due_date' => $request->due_date,
            ]);
            $data = $task->name;
            if($request->admin_id != $request->assign_id){
                Mail::to(Admin::find($request->assign_id)->email)->send(new AlertAssignEmail($data,Admin::find($request->assign_id)));
            }
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
        $task = Task::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'assign_id' => 'required',
            'admin_id' => 'required',
            'due_date' => 'required|date',
        ]);
        if ($validator->passes()) {

            $task->update([
                'name' => $request->name,
                'description' => $request->description,
                'assign_id' => $request->assign_id,
                'admin_id' => $request->admin_id,
                'due_date' => $request->due_date,
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
        $task = Task::find($id);
        $task->delete();

        return response()->json([
            'message' => __('lang.deleted'),
            'type'   => 'success'
        ]);
    }

    public function priority(Request $request)
    {
        Task::find($request->task_id)->update([
            'priority' => $request->priority
        ]);
        return response()->json([
            'message' => __('lang.changed'),
            'type'   => 'success'
        ]);
    }

    public function type(Request $request)
    {
        $data = 'Type Changed From '. Task::find($request->task_id)->type.' To '.$request->type == 'open' ?'close':'open';
       Task::find($request->task_id)->update([
           'type' => $request->type
       ]);
        Mail::to(Admin::find( Task::find($request->task_id)->assign_id)->email)->send(new AlertAssignEmail($data,Admin::find( Task::find($request->task_id)->assign_id)));

        return response()->json([
            'message' => __('lang.changed'),
            'type'   => 'success'
        ]);
    }
    public function status($id)
    {
       $task = Task::find($id);
        $data = 'Status Changed From '.$task->status.' To '.$task->status == 'open' ?'close':'open';
        $task->update([
           'status' => $task->status == 'open' ?'close':'open'
       ]);

        Mail::to(Admin::find($task->assign_id)->email)->send(new AlertAssignEmail($data,Admin::find($task->assign_id)));

        return response()->json([
            'message' => __('lang.changed'),
            'type'   => 'success'
        ]);
    }

    public function filter()
    {
        $tasks = Task::where('admin_id',auth('admin')->user()->id)->orWhere('assign_id',auth('admin')->user()->id)->get();

        return view('admin.tasks.filter',[
            'tasks'    => $tasks
        ]);
    }

    public function post(Request $request)
    {
        $theId = auth('admin')->user()->id;
        $tasks = Task::
            whereBetween('due_date',[$request->startDate,$request->endDate])
            ->where(function($q) use ($theId) {
                $q->where('admin_id',$theId)
                    ->orWhere('assign_id',$theId)
                    ->get();
            })
            ->get();

        $data = '';
        foreach ($tasks as $task) {
            static $var= 1;
            $data.='<tr>
                     <th>'.$var++.'</th>
                     <th>'.$task->name.'</th>
                     <th>'.$task->description.'</th>
                     <th>'.$task->due_date.'</th>
                     <th>'.$task->assigned->name.'</th>
                     <th>'. $task->typeLabel .'</th>
                     <th>'.$task->priorityLabel.'</th>
                     <th>'.$task->statusLabel.'</th>
                   </tr>';
        }
        if($tasks->count() == 0){
            $data.='<tr><td colspan="7" style="text-align: center">'.__('lang.noData').'</td></tr>';
        }

        return $data;
    }
}
