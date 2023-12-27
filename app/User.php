<?php

namespace App;

use App\Model\Core\Rol;
use App\Model\Core\Commerce;
use App\Model\Core\Project;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'lastname',
        'phone',
        'email',
        'address',
        'location',
        'password',
        'theme',
        'photo',
        'chexk_digit',
        'nacionality',
        'birthdate',
        'active',
        'rol_id',
        'commerce_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeName($query, $name)
    {
        return is_null($name) ?  $query : $query->where('name', 'LIKE', '%' . $name . '%');
    }

    public function scopeLastname($query, $lastname)
    {
        return is_null($lastname) ?  $query : $query->where('lastname', 'LIKE', '%' . $lastname . '%');
    }

    public function scopePhone($query, $phone)
    {
        return is_null($phone) ?  $query : $query->where('phone', 'LIKE', '%' . $phone . '%');
    }

    public function scopeEmail($query, $email)
    {
        return is_null($email) ?  $query : $query->where('email', 'LIKE', '%' . $email . '%');
    }

    public function scopeRol_id($query, $rolid)
    {
        return is_null($rolid) ?  $query : $query->where('rol_id', $rolid);
    }

    //BelongsTo (1-1): Un USER le pertenece un ROL
    public function rol()
    {
        return $this->belongsTo(Rol::class)
        ->with(['options']);
    }

    // public function rol($name = 'card')
    // {
    //     return $this->belongsTo(Rol::class)->with(['options' => function ($query) use ($name) {
    //         return isset($name) ?
    //             $query->where('options_rols.name', $name) :
    //             $query;
    //     }]);
    // }

    //BelongsTo (1-1): Un USER le pertenece un COMMERCE
    public function commerce()
    {
        return $this->belongsTo(Commerce::class);
    }

    //Un Proyecto le pertenece a varios Customer
    // Trae los projectos en los que el es customer
    public function projects_customer()
    {
        // return $this->belongsToMany(Customer::class);
        return $this->belongsToMany(Project::class, 'customers', 'user_id', 'project_id')
            ->with(['tags'])
            ->with(['notes']);
    }

    //Un Proyecto sera sustentado por varios Colaboradores
    // Trae los projectos en los que el es colaborador
    public function projects_colaborator()
    {
        // return $this->belongsToMany(Customer::class);
        return $this->belongsToMany(Project::class, 'colaborators', 'user_id', 'project_id')
            ->with(['tags'])
            ->with(['notes']);
    }
}
