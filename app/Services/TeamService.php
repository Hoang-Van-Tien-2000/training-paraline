<?php

namespace App\Services;

use App\Repositories\TeamRepository;
use Illuminate\Support\Facades\DB;

class TeamService 
{
  protected $teamRepository;
  
  public function __construct(TeamRepository $teamRepository)
  {
      $this->teamRepository = $teamRepository;
  }
  
  public function getAllTeam(){
    return $this->teamRepository->getAllTeam();
  }

  public function getSearchTeam($data){
    return $this->teamRepository->getSearchTeam($data);
  }
  
  public function saveTeamData($data)
  {
    return $this->teamRepository->save($data);
  }

  public function getById($id)
  {
    return $this->teamRepository->getById($id);
  }
  
  public function updateTeam($data, $id)
  {
    $team = $this->teamRepository->updateTeam($data, $id);   
    return $team; 
  }
  
  public function deleteTeam($id)
  {  
    return  $this->teamRepository->delete($id);
  }
}    