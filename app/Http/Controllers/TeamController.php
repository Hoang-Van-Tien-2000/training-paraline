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
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'team']);

            return $next($request);
        });
    }

    public function add()
    {
        return view('admin.teams.create');
    }

    public function addConfirm(TeamRequest $request)
    {
        $request->flash();
        session(['addTeam'=> $request->input()]);

        return view('admin.teams.create_confirm');
    }

    public function addConfirmSave(TeamRequest $request)
    {
        $this->teamRepository->create(session('addTeam'));

        return redirect()->route('admin.team.search')->with('message', config('messages.create_success'));
    }

    public function search(Request $request)
    {
        try {
            $teams = $this->teamRepository->search($request);

            return view('admin.teams.search', compact('teams'));

        } catch (ModelNotFoundException $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' Line : ' . $exception->getLine());

            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $team = $this->teamRepository->getById($id);

        return view('admin.teams.edit', compact('team'));
    }

    public function editConfirm(TeamRequest $request)
    {
        $request->flash();
        session(['editTeam'=> $request->input()]);

        return view('admin.teams.edit_confirm');
    }

    public function editConfirmSave($id, TeamRequest $request)
    {
        try {
            $this->teamRepository->update($id, session('editTeam'));

            return redirect()->route('admin.team.search')->with('message', config('messages.update_success'));

        } catch (\Exception $exception) {
            $error = config('messages.update_not_list') . $exception->getCode();
            Log::error('Message: ' . $exception->getMessage() . ' Line : ' . $exception->getLine());

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
            $error = config('messages.delete_not_list') . $exception->getCode();
            Log::error('Message: ' . $exception->getMessage() . ' Line : ' . $exception->getLine());

            return redirect()->route('admin.team.search')->with('error', $error);
        }
    }

    public function resetAddEdit(Request $request)
    {
        try {
            session()->forget('addTeam');
            session()->forget('editTeam');

            return redirect()->back();

        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' Line : ' . $exception->getLine());

            return back()->withError($exception->getMessage())->withInput();
        }
    }

}
