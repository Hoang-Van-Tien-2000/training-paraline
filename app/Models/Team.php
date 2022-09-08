<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    
    const DELETE_FLAG = 0; 
    
    protected $table = 'm_teams';
    protected $fillable = [
        'name', 'ins_id', 'upd_id', 'ins_datetime', 'upd_datetime', 'del_flag'
    ];
    
    public $timestamps = false;
        
    public function getAllTeam()
    {
        return Team::where('del_flag', Team::DELETE_FLAG )->get();
    }
    
    public function getSearchTeam($data)
    {
        if(empty($data))
        {
            return Team::where('del_flag', Team::DELETE_FLAG )->paginate(2);
        }
        
        return  Team::where('name', 'LIKE', "%{$data}%")->where('del_flag',  Team::DELETE_FLAG )->Paginate(2);
    }
}