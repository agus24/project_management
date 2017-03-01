<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\Project;
use App\model\Task;
use App\model\UserTask;
use App\utl_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    private $validator;

    public function __construct()
    {
        $this->validator = array(
                                    "name"          => "required",
                                    "start_date"    => "required|date",
                                    "end_date"      => "required|date",
                                    "priority"      => "required|numeric",
                                    "type_task"     => "required|numeric",
                                    "description"   => "required",
                                    "user"          => "required",
                                );
    }

    public function add($project_id)
    {
        $priority = (new utl_data)->where('name','priority')->get();
        $type_task = (new utl_data)->where('name','type_task')->get();
        $project = Project::findOrFail($project_id);
        return view('admin.task.add',['project'=>$project,"priority"=>$priority,"type_task"=>$type_task]);
    }

    public function insert(Request $request, $project_id)
    {
        $this->validate($request,$this->validator);

        // dd($project_id);
        $task = new Task;
        $task->name         = $request->input('name');
        $task->start_date   = $request->input('start_date');
        $task->end_date     = $request->input('end_date');
        $task->priority     = $request->input('priority');
        $task->type_task    = $request->input('type_task');
        $task->description  = $request->input('description');
        $task->poin         = $request->input('poin');
        $task->status       = 0;
        $task->project_id   = $project_id;

        $task->save();

        $user = $request->input('user');

        foreach($user as $key => $value)
        {
            $user_task = new UserTask;
            $user_task->user_id = $value;
            $user_task->task_id = $task->id;
            $user_task->save();
        }

        return redirect('project/'.$project_id);
    }

    public function show($project_id,$task_id)
    {
        $project = Project::findOrFail($project_id);

        $task = Task::findOrFail($task_id);

        $user = $task->users()->get();

        $priority_name = DB::table('utl_data')->where('name',DB::raw("'priority'"))->where('value',$task->priority)->get()[0]->text;
        $type_task_name = DB::table('utl_data')->where('name',DB::raw("'type_task'"))->where('value',$task->type_task)->get()[0]->text;

        return view('admin.task.show',[
                                        "project" => $project,
                                        "task" => $task,
                                        "priority_name"  => $priority_name,
                                        "type_task_name" => $type_task_name,
                                        "users" => $user,
                                        ]);
    }
}
