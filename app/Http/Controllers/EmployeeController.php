<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function add(){
        return view('admin.employees.create');
    }
    
    public function search(){
        return view('admin.employees.search');
    }
}