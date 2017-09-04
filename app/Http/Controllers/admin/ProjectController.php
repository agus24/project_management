<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\Project;
use App\model\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
	private $rule;

	public function __construct(){
		$this->rule = array(
			"name" => "required",
			"description" => "required|max:1000",
		);
	}

    public function newProject()
    {
    	return view('admin.project.new');
    }

    public function postProject(Request $request, Project $project)
    {
    	$this->validate($request,$this->rule);

    	$project->name = $request->input('name');
    	$project->description = $request->input('description');
    	$project->pic = Auth::user()->id;
    	$project->save();

    	return redirect('project/'.$project->id);
    }

    public function show($id)
    {
    	$project = Project::find($id);
    	if(Auth::user()->id == $project->pic){
    		$tasks = $project->task()
    							->join('utl_data as b', function($join){
							    		$join->on('b.name',DB::raw("'type_task'"));
							    		$join->on('b.value','tasks.type_task');
							    	})
							    ->join('utl_data as c',function($join){
							    		$join->on('c.name',DB::raw("'priority'"));
							    		$join->on('c.value','tasks.priority');
							    	})
							    ->select('tasks.*','b.text as type_task_name','c.text as priority_name');
    	}
    	else{
    		$tasks = Auth::user()->tasks()->where('project_id',$id)
			    				->join('utl_data as b', function($join){
							    		$join->on('b.name',DB::raw("'type_task'"));
							    		$join->on('b.value','tasks.type_task');
							    	})
							    ->join('utl_data as c',function($join){
							    		$join->on('c.name',DB::raw("'priority'"));
							    		$join->on('c.value','tasks.priority');
							    	})
							    ->select('tasks.*','b.text as type_task_name','c.text as priority_name');
    	}

    	return view('admin.task.list',["project" => $project, "tasks" => $tasks]);
    }

    public function semua()
    {
        $project = Project::where('pic',Auth::user()->id)
                            ->join('users as pic','projects.pic','pic.id')
                            ->join('tasks','tasks.project_id','projects.id')
                            ->join('user_task','tasks.id','user_task.task_id')
                            ->join('users','users.id','user_task.user_id')
                            ->select('projects.*','pic.name as pic_name','users.name as user_list')
                            ->groupBy('projects.id')
                            ->get();
        $project_name = $project->groupBy('name')->keys();

        return view('admin.project.all',["project" => $project,"project_name"=>$project_name]);
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('admin.project.edit',["project" => $project]);
    }

    public function update(Request $request,$id)
    {

        $this->validate($request,$this->rule);

        $project = Project::findOrFail($id);

        $name = $request->input('name');
        $description = $request->input('description');

        $project->name = $name;
        $project->description = $description;
        $project->save();

        return redirect('project/'.$id);

    }

    public function destroy($id)
    {
        Project::find($id)->delete();
        $task = (new Task)->deleteByProject($id);
        return redirect('home');
    }
}
