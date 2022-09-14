<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use Illuminate\Http\Request;
use App\Repositories\TeamRepository;
use Illuminate\Support\Facades\Log;

class TeamController extends Controller
{
    protected $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }
    
    public function add(){
        return view('admin.teams.create');
    }

    public function addConfirm(TeamRequest $request)
    { 
        $request->session()->put('addTeam',$request->name);
        return view('admin.teams.create_confirm');
    }
    
    public function addConfirmSave(TeamRequest $request)
    {
        $this->teamRepository->create($request->all());
        return redirect()->route('admin.team.search')->with('message', config('messages.create_success'));
    }
    
    public function searchByName(Request $request)
    {
        $teams = $this->teamRepository->searchByName($request->input('keyword'));
        return view('admin.teams.search', compact('teams'));
    }

    public function edit($id)
    {
        $team = $this->teamRepository->getById($id);
        return view('admin.teams.edit', compact('team')); 
    }
    
    public function editConfirm(TeamRequest $request)
    { 
        $request->session()->put('editTeam', $request->name);
        return view('admin.teams.edit_confirm'); 
    }

    public function editConfirmSave(TeamRequest $request, $id)
    {
        try {

            $this->teamRepository->update($request->only(['name']), $id);
            return redirect()->route('admin.team.search')->with('message', config('messages.update_success'));

        } catch (\Exception $exception) {
            $error= config('messages.update_not_list'). $exception->getCode();
            Log::error($error);
            return redirect()->route('admin.team.search')->with('error', $error);
        }
    }

    public function delete($id)
    {
        try {
            $result = $this->teamRepository->delete($id);
            if ($result) {
                return redirect()->route('admin.team.search')->with('message', config('messages.delete_success'));
            } else {
                return redirect()->route('admin.team.search')->with('error', config('messages.delete_failed'));
            }
        } catch (\Exception $exception) {
            $error= config('messages.delete_not_list'). $exception->getCode();
            Log::error($error);
            return redirect()->route('admin.team.search')->with('error', $error);
        }

    }
    
}