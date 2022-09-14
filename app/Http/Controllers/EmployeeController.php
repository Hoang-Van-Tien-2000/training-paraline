<?php

namespace App\Http\Controllers;

use App\Repositories\TeamRepository;
use App\Http\Requests\EmployeeRequest;
use App\Repositories\EmployeeRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

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
        $this->employeeRepository->create($request->all());
        return redirect()->route('admin.employee.search')->with('message', config('messages.create_success'));
    }

    public function search()
    {
        //$this->employeeRepository->search();
        return view('admin.employees.search');
    }


}