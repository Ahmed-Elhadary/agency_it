<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Group;
use App\Models\Task;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TasksService extends Controller
{
    protected $admin;
    public function tasks($id)
    {
        $this->admin = $id;
        $task = Task::where('admin_id',$id)->orWhere('assign_id',$id)->get();
        return DataTables::of($task)
            ->addColumn('idn', function(){
                static $var= 1;
                return $var++;
            })
            ->addColumn('name', function($task){
                return $task->name;
            })
            ->addColumn('due_date', function($task){
                return date("d-M-Y",strtotime($task->due_date));
            })
            ->addColumn('description', function($task){
                return $task->description;
            })
            ->addColumn('status', function($task){
                return $task->statusLabel;
            })
            ->addColumn('priority', function($task){
                return $task->priorityLabel;
            })
            ->addColumn('assigned', function($task){
                return $task->assign_id == $this->admin ? '<span class="badge badge-light">'.$task->assigned->name.'</span>' : $task->assigned->name;
            })
            ->addColumn('type', function($task){
                return $task->typeLabel;
            })
            ->addColumn('action', function($task){
                $status = '';
                $delete = '';
                $edit = '';
                if(Admin::find($this->admin)->group->permission->task_close == 1 && $task->status =='open'){
                    $state = __('lang.close').'<span class="fa fa-lock pr-1 pl-1 "></span>';
                    $status ='<a onclick="EditStatus('. $task->id .')" class="btn btn-success btn-xs text-white m-1">'.$state.'</a>';
                }
                if(Admin::find($this->admin)->group->permission->task_reopen == 1 && $task->status =='close'){
                    $state = __('lang.open').'<span class="pr-1 pl-1 fa fa-eye"></span>';
                    $status ='<a onclick="EditStatus('. $task->id .')" class="btn btn-success btn-xs text-white m-1">'.$state.'</a>';
                }
                if(Admin::find($this->admin)->group->permission->task_edit == 1){
                    $edit = '<a onclick="editForm('. $task->id .')" class="btn btn-primary btn-xs text-white m-1"><i class="fa fa-edit"></i> </a>';
                }
                if(Admin::find($this->admin)->group->permission->task_delete == 1){
                    $delete = '<a onclick="deleteData('. $task->id .')" class="btn btn-danger btn-xs text-white m-1"><i class="fa fa-trash"></i> </a>';
                }

                return  $edit.$delete.$status.
                    '<a onclick="EditPriority('. $task->id .')" class="btn btn-info btn-xs text-white m-1">'.__('lang.priority').'</a>'.
                    '<a onclick="EditType('. $task->id .')" class="btn btn-warning btn-xs text-white m-1">'.__('lang.type').'</a>';
            })

            ->rawColumns(['name','due_date','priority','assigned','description','type','status','idn', 'action'])->make(true);
    }
}
