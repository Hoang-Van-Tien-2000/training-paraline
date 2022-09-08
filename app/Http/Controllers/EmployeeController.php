<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeamService;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }
    
    public function add(){
        $teams = $this->teamService->getAllTeam();
        return view('admin.employees.create', compact('teams'));
    }

    public function addConfirm(EmployeeRequest $request)
    { 
        $data = [
        'firstname' => $request->FirstName,
        'lastname' => $request ->LastName 
        ];
        $request->session()->put('addEmployee', $data);
        return view('admin.employees.create_confirm');
    }

    public function search(){
        return view('admin.employees.search');
    }

    
}