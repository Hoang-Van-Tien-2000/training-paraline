<?php

namespace App\Http\Controllers;

use App\Jobs\EmployeeJob;
use App\Repositories\TeamRepository;
use App\Http\Requests\EmployeeRequest;
use App\Repositories\EmployeeRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class EmployeeController extends Controller
{
    protected $teamRepository, $employeeRepository;

    public function __construct(TeamRepository $teamRepository, EmployeeRepository $employeeRepository)
    {
        $this->teamRepository = $teamRepository;
        $this->employeeRepository = $employeeRepository;
    }

    public function add()
    {
        $teams = $this->teamRepository->getAll();
        return view('admin.employees.create', compact('teams'));
    }

    public function addConfirm(EmployeeRequest $request)
    {
        //upload file
        if($request->file('avatar')){
            $file = $request->file('avatar');
            $fileName   =$file->getClientOriginalName();
            Storage::disk('public')->put($fileName, File::get($file));
        }

        $employee = collect([$request->input()]);
        $request->session()->put('addEmployee', $employee);
        $request->session()->put('avatar', $fileName);
        foreach (Session::get('addEmployee') as $employee) {
            $team_id = $employee['team_id'];
        }
        $team = $this->teamRepository->findById($team_id);
        return view('admin.employees.create_confirm', compact('team'));

    }

    public function addConfirmSave(Request $request)
    {
        try {
            $employee = $this->employeeRepository->create($request->all());
            $emailJob = new EmployeeJob($employee);
            dispatch($emailJob);
            return redirect()->route('admin.employee.search')->with('message', config('messages.create_success'));
        } catch (QueryException $e) {
            $error = $e->errorInfo;
            Log::error($error);
            return redirect()->back()->with('error', $error);
        }
    }

    public function search(Request $request)
    {
        $teams = $this->teamRepository->getAll();
        $conditions = $request->only(['team', 'name', 'email']);
        $employees = $this->employeeRepository->search($conditions);
        return view('admin.employees.search', compact('employees', 'teams'));
    }


}