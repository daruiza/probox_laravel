<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable =
    [
        'id',
        'is_owner',
        'user_id',
        'project_id',
    ];    

    public function scopeId($query, $id)
    {
        return is_null($id) ?  $query : $query->where('id', $id);
    }

    public function scopeIsOwner($query, $is_owner)
    {
        return is_null($is_owner) ?  $query : $query->where('is_owner', $is_owner);
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
