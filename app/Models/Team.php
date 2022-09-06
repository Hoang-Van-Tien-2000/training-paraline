<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    
    protected $table = 'm_teams';
    protected $fillable = [
        'name', 'ins_id', 'upd_id', 'ins_datetime', 'upd_datetime', 'del_flag'
    ];
    
    public $timestamps = false;
}