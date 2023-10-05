<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Module extends Model
{
    protected $table = 'modules';
    protected $fillable = [
        'id',
        'name',
        'description',
        'label',
        'active'
    ];

    //Varios modelos le Pertenece a una option
    public function options()
    {
        //TODO: Falta modelo option
        //return $this->belongsTo(Option::class);
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
}
