<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ProjectNews extends Model
{
    protected $table = "project_news"
    protected $primaryKey = 'id';
    protected $fillable = ['project_id', 'date', 'news'];
}
