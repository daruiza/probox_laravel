<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OptionRol extends Model
{
    protected $table = 'options_rols';
    protected $fillable = [
        'id',
        'name',
        'description',
        'active',
        'id_rol',
        'id_option'
    ];

    //-------: Varios OPTIONS le pertenecen a varios ROLS.
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

    public function scopeId_rol($query, $idrol)
    {
        return is_null($idrol) ?  $query : $query->where('id_rol', $idrol);
    }

    public function scopeId_option($query, $idoption)
    {
        return is_null($idoption) ?  $query : $query->where('id_option', $idoption);
    }
}
