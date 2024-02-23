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
        'class',
        'default',
        'active'
    ];

    //BelongsTo (1-1): Una TAG le pertenece un PROJECT
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'projects_tags', 'tag_id', 'project_id');
    }

    public function scopeCategory($query, $category)
    {
        return is_null($category) ?  $query : $query->where('category', 'LIKE', '%' . $category . '%');
    }

    public function scopeDefault($query, $default)
    {
        return is_null($default) ?  $query : $query->where('default', $default ? 1 : 0);
    }
}
