<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use Illuminate\Http\Request;
use App\Repositories\TeamRepository;

class TeamController extends Controller
{
    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }
    
    public function add(){
        return view('admin.teams.create');
    }

    public function addConfirm(TeamRequest $request)
    { 
        $request->session()->put('addTeam', $request->name);
        return view('admin.teams.create_confirm');
    }
    
    public function addConfirmSave(TeamRequest $request)
    {
        $this->teamRepository->create($request->all());
        return redirect()->route('admin.team.search')->with('status', config('messages.create'));
    }
    
    public function seachByName(Request $request)
    {
        $teams = $this->teamRepository->seachByName($request->input('keyword'));
        return view('admin.teams.search', compact('teams'));
    }

    public function edit($id)
    {
        $team = $this->teamRepository->getById($id);
        return view('admin.teams.edit', compact('team')); 
    }
    
    public function editConfirm(TeamRequest $request, $id)
    { 
        $request->session()->put('editTeam', $request->name);
        return view('admin.teams.edit_confirm'); 
    }

    public function editConfirmSave(TeamRequest $request, $id)
    {       
        $this->teamRepository->updateData($request->only(['name']), $id);
        return redirect()->route('admin.team.search')->with('status', config('messages.update'));
    }

    public function delete($id){
        $this->teamRepository->delete($id);
        return redirect()->route('admin.team.search')->with('status', config('messages.delete'));
    }
    
}