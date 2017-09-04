<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{

    protected $table = "projects";
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'pic', 'description'];


    public function task(){
    	return $this->hasMany('App\model\Task','project_id','id');
    }
}
