<?php

namespace App\Model\Core;

use App\Model\Core\Project;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    protected $fillable =
    [
        'id',
        'name',
        'file',
        'type',
        'description',
        'approved',
        'focus',
        'project_id',
    ];

    //BelongsTo (1-1): Una NOTE le pertenece un PROJECT
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeId($query, $id)
    {
        return is_null($id) ?  $query : $query->where('id', $id);
    }

    public function scopeProjectId($query, $project_id)
    {
        return is_null($project_id) ?  $query : $query->where('project_id', $project_id);
    }
}
