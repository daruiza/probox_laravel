<?php

namespace App\Model\Core;

use App\Model\Core\Project;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = [
        'id',
        'category',
        'name',
        'active'
    ];

    //BelongsTo (1-1): Una TAG le pertenece un PROJECT
    public function projects()
    {
        return $this->belongsToMany(Project::class,'projects_tags', 'tag_id', 'project_id');
    }

   
}
