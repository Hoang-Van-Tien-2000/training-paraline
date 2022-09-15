<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\DelFlagScope;

class Employee extends Model
{
    use HasFactory;

    protected static function booted()
    {
        parent::boot();
        static::addGlobalScope(new DelFlagScope);
    }

    protected $table = 'm_employees';
    protected $fillable = [
        'team_id',
        'email',
        'first_name',
        'last_name',
        'upd_datetime',
        'password',
        'gender',
        'birthday',
        'address',
        'avatar',
        'salary',
        'position',
        'status',
        'type_of_work',
        'ins_id',
        'upd_id',
        'ins_datetime',
        'upd_datetime',
        'del_flag'
    ];
    public $timestamps = false;

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }



}