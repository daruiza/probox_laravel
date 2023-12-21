<?php

namespace App\Model\Core;

use App\Model\Core\Project;
use App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Commerce extends Model
{
    protected $table = 'commerces';
    protected $fillable = [
        'id',
        'name',
        'phone',
        'address',
        'description',
        'logo',
        'active'
    ];

    //hasMany (1-*): 
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    //hasMany (1-*): 
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function scopeUserId($query, $user_id)
    {
        return is_null($user_id) ?  $query : $query
        ->join('users', 'users.commerce_id', '=', 'commerces.id')
        ->where('users.id', $user_id);
    }
}
