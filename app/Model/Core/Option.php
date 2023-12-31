<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Option extends Model
{
    protected $table = 'options';
    protected $fillable = [
        'id',
        'name',
        'description',
        'label',
        'icon',
        'active',
        'module_id'
    ];

    //belongsTo: Varios OPTIONS le pertenecen a un MODULE.
    public function module()
    {
        /*
        1er argumento: Modelo relacionado
        2do argumento: FK modelo relacionado
        3er argumento: PK de este modelo padre
        */
        return $this->belongsTo(Module::class);
    }

    //TABLA INTERMEDIA: Relación Options_Rols
    public function optionsrols()
    {
        return $this->belongsToMany(OptionRol::class);
    }

    //belongsToMany: Varios OPTIONS le pertenecen a varios ROLS.
    public function rols()
    {
        return $this->belongsToMany(Rol::class);
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

    public function scopeLabel($query, $label)
    {
        return is_null($label) ?  $query : $query->where('label', 'LIKE', '%' . $label . '%');
    }

    public function scopeModule_id($query, $moduleid)
    {
        return is_null($moduleid) ?  $query : $query->where('module_id', $moduleid);
    }
}
