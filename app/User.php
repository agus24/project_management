<?php

namespace App;

use App\model\Project;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function project()
    {
        return $this->hasMany('App\model\Project','pic','id');
    }

    public function tasks()
    {
        return $this->belongsToMany('App\model\Task','user_task');
    }

    public function allProject()
    {
        return Project::get();
    }

    public function filterProject()
    {
        return $this->join('user_task','user_task.user_id','users.id')
                    ->join('tasks','tasks.id','user_task.task_id')
                    ->rightjoin('projects','projects.id','tasks.project_id')
                    ->select('projects.*')
                    ->groupBy('projects.id')
                    ->where('users.id',$this->id)
                    ->orwhere('projects.pic',$this->id)
                    ->where('projects.deleted_at',Null)
                    ;
    }

    
}
