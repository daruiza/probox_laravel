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
        'active',
        'id_module'
    ];

    //belongsTo: Varios OPTIONS le pertenecen a un MODULE.
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    //belongsToMany: Varios OPTIONS le pertenecen a varios ROLS.
    public function rols()
    {
        return $this->belongsToMany(OptionRol::class);
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

    public function scopeId_module($query, $idmodule)
    {
        return is_null($idmodule) ?  $query : $query->where('id_module', $idmodule);
    }
}
