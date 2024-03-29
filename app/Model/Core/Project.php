<?php

namespace App\Model\Core;

use Carbon\Carbon;

use App\User;
use App\Model\Core\Commerce;
use App\Model\Core\Tag;
use App\Model\Core\Task;
use App\Model\Core\Note;
use App\Model\Core\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'id',
        'name',
        'price',
        'date_init',
        'date_closed',
        'address',
        'location',
        'quotation',
        'goal',
        'logo',
        'photo',
        'description',
        'progress',
        'focus',
        'active',
        'commerce_id'
    ];

    //HasMany: Un PROJECT le pertenece a varios TASK.
    public function tasks()
    {
        return $this->hasMany(Task::class)->with(['evidences']);;
    }

    //HasMany: Un PROJECT puede tener varios NOTES.
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    //HasMany: Un PROJECT puede tener varios Documentos.
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    //Un Proyecto le pertenece a varios Customes
    public function customers()
    {
        return $this->belongsToMany(User::class, 'customers', 'project_id', 'user_id');
    }

    //Un Proyecto le pertenece a varios Customes
    public function colaborators()
    {
        return $this->belongsToMany(User::class, 'colaborators', 'project_id', 'user_id');
    }

    //Un Proyecto posee varios tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'projects_tags', 'project_id', 'tag_id')
            ->withPivot('id');
    }

    //BelongsTo (1-1): Un PROJECT le pertenece un COMMERCE
    public function commerce()
    {
        return $this->belongsTo(Commerce::class);
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

    public function scopeAddress($query, $address)
    {
        return is_null($address) ?  $query : $query->where('address', 'LIKE', '%' . $address . '%');
    }

    public function scopePrice($query, $price)
    {
        return is_null($price) ?  $query : $query->where('price', $price);
    }

    public function scopeDate_init($query, $date_init)
    {
        return is_null($date_init) ?  $query : $query->where('date_init', '>', Carbon::create($date_init)->toDateTimeString());
    }

    public function scopeDate_closed($query, $date_closed)
    {
        return is_null($date_closed) ?  $query : $query->where('date_closed', '>', $date_closed);
    }

    public function scopeDate_between($query, $date, $date_start, $date_end)
    {
        return
            is_null($date) ||
            is_null($date_start) ||
            is_null($date_end) ?  $query : $query->whereBetween($date, [$date_start, $date_end]);
    }

    public function scopequotation($query, $quotation)
    {
        return is_null($quotation) ?  $query : $query->where('quotation', 'LIKE', '%' . $quotation . '%');
    }

    public function scopeGoal($query, $goal)
    {
        return is_null($goal) ?  $query : $query->where('goal', 'LIKE', '%' . $goal . '%');
    }

    public function scopeDescription($query, $description)
    {
        return is_null($description) ?  $query : $query->where('description', 'LIKE', '%' . $description . '%');
    }

    public function scopeFocus($query, $focus)
    {
        return is_null($focus) ?  $query : $query->where('focus', $focus);
    }
}
