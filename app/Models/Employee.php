<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'm_teams';
    protected $fillable = [
        'team_id', 'email', 'first_name', 'last_name', 'upd_datetime', 'password',
        'gender', 'birthday', 'address', 'avatar', 'salary', 'position', 'status', 'type_of_work',
        'ins_id', 'upd_id', 'ins_datetime', 'upd_datetime', 'del_flag'
    ];
    
}