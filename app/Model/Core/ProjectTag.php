<?php

namespace App\Model\Core;

use App\Model\Core\Project;

use Illuminate\Database\Eloquent\Model;

class ProjectTag extends Model
{
    protected $table = 'projects_tags';
    protected $fillable = [
        'id',
        'tag_id',
        'project_id'        
    ];
    
}
