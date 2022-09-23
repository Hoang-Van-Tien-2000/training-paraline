<?php

namespace App\Models;

use App\Scopes\DelFlagScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected static function booted()
    {
        parent::boot();
        static::addGlobalScope(new DelFlagScope);
    }

    protected $table = 'm_teams';
    protected $fillable = [
        'name',
        'ins_id',
        'upd_id',
        'ins_datetime',
        'upd_datetime',
        'del_flag'
    ];

    public $timestamps = false;

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = trim($name);
    }

}
