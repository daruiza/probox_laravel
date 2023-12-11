<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

class Colaborator extends Model
{
    protected $table = 'colaborators';
    protected $fillable =
    [
        'id',
        'activity_rol',
        'date_start',
        'date_departure',
        'recomended',
        'boss_name',
        'user_id',
        'project_id',
    ];    

    public function scopeId($query, $id)
    {
        return is_null($id) ?  $query : $query->where('id', $id);
    }

    public function scopeActivityRol($query, $activity_rol)
    {
        return is_null($activity_rol) ?  $query : $query->where('activity_rol', $activity_rol);
    }

    public function scopeUserId($query, $user_id)
    {
        return is_null($user_id) ?  $query : $query->where('user_id', $user_id);
    }

    public function scopeProjectId($query, $project_id)
    {
        return is_null($project_id) ?  $query : $query->where('project_id', $project_id);
    }
}
