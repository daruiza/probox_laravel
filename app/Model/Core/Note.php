<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';
    protected $fillable =
    [
        'id',
        'description',
        'approved',
        'focus',
        'project_id',
    ];

    public function scopeId($query, $id)
    {
        return is_null($id) ?  $query : $query->where('id', $id);
    }  

    public function scopeProjectId($query, $project_id)
    {
        return is_null($project_id) ?  $query : $query->where('project_id', $project_id);
    }
}
