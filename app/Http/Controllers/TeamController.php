<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Services\TeamService;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }
    
    public function add(){
        return view('admin.teams.create');
    }

    public function addConfirm(TeamRequest $request)
    { 
        $request->session()->put('add', $request->name);
        return view('admin.teams.create_confirm');
    }
    
    public function addConfirmSave(TeamRequest $request)
    { 
        $data = $request->all();
        $team = $this->teamService->saveTeamData($data);
        return redirect()->route('admin.team.search')->with('status','Create succesfull !');
    }
    
    public function search(Request $request)
    {
        $teams = $this->teamService->getSearchTeam($request->input('keyword'));
        return view('admin.teams.search', compact('teams'));
    }

    public function edit($id)
    {
        $team = $this->teamService->getById($id);
        return view('admin.teams.edit', compact('team')); 
    }
    
    public function editConfirm(TeamRequest $request, $id)
    { 
        $request->session()->put('edit', $request->name);
        return view('admin.teams.edit_confirm'); 
    }

    public function editConfirmSave(TeamRequest $request, $id)
    { 
        $data = $request->only(['name']);        
        $team = $this->teamService->updateTeam($data, $id);
        return redirect()->route('admin.team.search')->with('status','Update succesfull !!');
    }

    public function delete($id){
        $this->teamService->deleteTeam($id);
        return redirect()->route('admin.team.search')->with('status','Delete succesfull !');
    }
    
}