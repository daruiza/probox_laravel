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
        'rol_id',
        'option_id'
    ];

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

    public function scopeRol_id($query, $rolid)
    {
        return is_null($rolid) ?  $query : $query->where('rol_id', $rolid);
    }

    public function scopeOption_id($query, $optionid)
    {
        return is_null($optionid) ?  $query : $query->where('option_id', $optionid);
    }
}
