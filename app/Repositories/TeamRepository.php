<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TeamRepository extends BaseRepository
{
  public function __construct(Team $team)
  {
      $this->team = $team;
  }
    public function model()
    {
        return Team::class;
    }

    public function getAllTeam(){  
      return $this->team->get();
    }
    
    public function save($data)
    {
      $team = new $this->team;
      $team->name = $data['name'];
      $team->ins_id = Auth::id();
      $team->ins_datetime = Carbon::now(); 
      //  $team->del_flag =  
      $team->save();
      Session::forget('team');
      return $team->fresh();
    }
}    