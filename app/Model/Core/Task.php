<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = [
        'id',
        'name',
        'description',
        'date_init',
        'date_closed',
        'focus',
        'id_task',
        'project_id'
    ];

    //belongsTo: Varios TASKS le pertenecen a un PROJECT.
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    //HasMany: Un TASK le pertenece a varios EVIDENCES.
    public function evidences()
    {
        return $this->hasMany(Evidence::class);
    }

    public function scopeName($query, $name)
    {
        return is_null($name) ?  $query : $query->where('name', 'LIKE', '%' . $name . '%');
    }

    public function scopeDescription($query, $description)
    {
        return is_null($description) ?  $query : $query->where('description', 'LIKE', '%' . $description . '%');
    }

    public function scopeDate_init($query, $date_init)
    {
        return is_null($date_init) ?  $query : $query->where('date_init', 'LIKE', '%' . $date_init . '%');
    }

    public function scopeDate_closed($query, $date_closed)
    {
        return is_null($date_closed) ?  $query : $query->where('date_closed', 'LIKE', '%' . $date_closed . '%');
    }

    public function scopeFocus($query, $focus)
    {
        return is_null($focus) ?  $query : $query->where('focus', 'LIKE', '%' . $focus . '%');
    }

    public function scopeId_task($query, $id_task)
    {
        return is_null($id_task) ?  $query : $query->where('id_task', 'LIKE', '%' . $id_task . '%');
    }

    public function scopeProject_id($query, $project_id)
    {
        return is_null($project_id) ?  $query : $query->where('project_id', 'LIKE', '%' . $project_id . '%');
    }
    
}
