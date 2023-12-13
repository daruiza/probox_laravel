<?php

namespace App\Model\Core;

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
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

   
}
