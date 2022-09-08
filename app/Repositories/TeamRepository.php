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
    
    public function getAllTeam()
    {
        $teams = $this ->team ->getAllTeam();
        return $teams;
    }
  
    public function getSearchTeam($data)
    {  
      return $this->team->getSearchTeam($data);
    }
    
    public function getById($id)
    {
      return $this->team->where('id',$id)->first();
    }
    
    public function save($data)
    {
      Session::forget('add');
      $team = new $this->team;
      $team->name = $data['name'];
      $team->ins_id = Auth::id();
      $team->ins_datetime = Carbon::now(); 
      //  $team->del_flag =  
      $team->save();
      return $team->fresh();
    }

    public function updateTeam($data, $id)
    {
      Session::forget('edit');
      $team = $this->team->find($id);
      $team->name = $data['name'];
      $team->upd_id = Auth::id();
      $team->upd_datetime = Carbon::now(); 
      $team->update();
      return $team;
    }

    public function delete($id)
    {
        $team = $this->team->find($id);
        $team->delete();
    }
    
}    