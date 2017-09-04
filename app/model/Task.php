<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $fillable = ['name','poin','project_id','start_date','end_date','description','priority','status','type_task'];

    public function project(){
    	return $this->belongsTo('App\model\Project','project_id','id');
    }

    public function users(){
    	return $this->belongsToMany('App\User','user_task');
    }

	public function joinAll()
    {
    	return $this->join('utl_data as b', function($join){
				    		$join->on('b.name',"'type_task'");
				    		$join->on('b.value','tasks.type_task');
				    	})
				    ->join('utl_data as c',function($join){
				    		$join->on('c.name',"'priority'");
				    		$join->on('c.value','tasks.priority');
				    	})
				    ->select('tasks.*','b.text as type_task_name','c.text as priority_name')
				    ;
    }

    public function deleteByProject($id)
    {
        $data = $this->where('project_id',$id);
        $task_id = $data->get()->map(function($value,$key) { return $value->id; });
        DB::table('user_task')->wherein('task_id',$task_id)->delete();
        $data->delete();
    }
}
