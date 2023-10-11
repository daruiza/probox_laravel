<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rol extends Model
{
    protected $table = 'rols';
    protected $fillable = [
        'id',
        'name',
        'description',
        'active'
    ];

    //HasMany: Un Rol le pertenece a varios usuarios.
    public function options()
    {
        //TODO: Falta modelo option
    }

    public function scopeActive($query, $active)
    {
        return isset($active) ?
            $query->where('active', intval($active)) :
            $query->where('active', 1);
    }

    public function scopeName($query, $name)
    {
        return is_null($name) ?  $query : $query->where('name', 'LIKE', '%' . $name . '%');
    }

    public function scopeDescription($query, $description)
    {
        return is_null($description) ?  $query : $query->where('description', 'LIKE', '%' . $description . '%');
    }

}
