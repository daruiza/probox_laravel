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

    //BelongsToMany: Varios ROLS le pertenecen a varios OPTIONS.
    public function options()
    {
        return $this->belongsToMany(Option::class, 'options_rols', 'rol_id', 'option_id');
    }

    // public function optionscard()
    // {
    //     return $this->belongsToMany(Option::class, 'options_rols', 'rol_id', 'option_id')->where('options_rols.name', 'card');
    // }

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

    public function scopeIdRol($query, $idRol)
    {
        return $idRol ?
            $query->where('id', '!=', intval($idRol)) :
            $query->where('id', '!=', 1);
    }
}
