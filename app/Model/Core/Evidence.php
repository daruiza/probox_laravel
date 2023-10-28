<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evidence extends Model
{
    protected $table = 'evidences';
    protected $fillable = [
        'id',
        'name',
        'file',
        'type',
        'description',
        'approved',
        'focus',
        'task_id'
    ];

    //belongsTo: Varios EVIDENCES le pertenecen a un TASK.
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function scopeName($query, $name)
    {
        return is_null($name) ?  $query : $query->where('name', 'LIKE', '%' . $name . '%');
    }

    public function scopeFile($query, $file)
    {
        return is_null($file) ?  $query : $query->where('file', 'LIKE', '%' . $file . '%');
    }

    public function scopeType($query, $type)
    {
        return is_null($type) ?  $query : $query->where('type', 'LIKE', '%' . $type . '%');
    }

    public function scopeDescription($query, $description)
    {
        return is_null($description) ?  $query : $query->where('description', 'LIKE', '%' . $description . '%');
    }

    public function scopeApproved($query, $approved)
    {
        return is_null($approved) ?  $query : $query->where('approved', 'LIKE', '%' . $approved . '%');
    }

    public function scopeFocus($query, $focus)
    {
        return is_null($focus) ?  $query : $query->where('focus', 'LIKE', '%' . $focus . '%');
    }

    public function scopeTask_id($query, $task_id)
    {
        return is_null($task_id) ?  $query : $query->where('task_id', 'LIKE', '%' . $task_id . '%');
    }
}
