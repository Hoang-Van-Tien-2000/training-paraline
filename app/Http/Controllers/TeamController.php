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
        $request->session()->put('team', $request->name);
        return view('admin.teams.create_confirm');
    }
    
    public function addConfirmSave(TeamRequest $request)
    { 
        $data = $request->all();
        $team = $this->teamService->saveTeamData($data);
        return redirect()->route('admin.team.search')->with('status','Thêm mới thành công !');
    }
    
    public function search(Request $request){
        $teams = $this->teamService->getAllTeam();
        // $keyword = "";
        // if ($request->input('keyword')) {

        //     $keyword = $request->input('keyword');
        // }
        // $teams = Team::where('name', 'LIKE', "%{$keyword}%")->Paginate(3);
        return view('admin.teams.search', compact('teams'));
    }
}