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
  
  public function saveTeamData($data)
  {
    return $this->teamRepository->save($data);
  }
}    