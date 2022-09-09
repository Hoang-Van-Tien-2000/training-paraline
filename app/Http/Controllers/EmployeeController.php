<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TeamRepository;
use App\Http\Requests\EmployeeRequest;
use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{
    public function __construct(TeamRepository $teamRepository, EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->teamRepository = $teamRepository;
    }
    
    public function add(){
        $teams = $this->teamRepository->getAll();
        return view('admin.employees.create', compact('teams'));
    }

    public function addConfirm(EmployeeRequest $request)
    { 
        $request->session()->put('addEmployee',  $request->input());
        return view('admin.employees.create_confirm');
    }

    public function search(){
        return view('admin.employees.search');
    }

    
}