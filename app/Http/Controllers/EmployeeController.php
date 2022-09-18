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
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'employee']);
            return $next($request);
        });

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
        if ($request->file('avatar')) {
            $file = $request->file('avatar');

            if ($file->isValid()) {
                $fileName = $file->getClientOriginalName();
                Storage::disk('public')->put($fileName, File::get($file));
            }
        }
        $request->flash();
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
        $request->only('team', 'name', 'email');
        $request->flash();
        $employees = $this->employeeRepository->search($request);
        return view('admin.employees.search', compact('employees', 'teams'));
    }

    public function edit($id)
    {
        $employee = $this->employeeRepository->getById($id);
        $teams = $this->teamRepository->getAll();
        return view('admin.employees.edit', compact('employee', 'teams'));
    }

    public function editConfirm(EmployeeRequest $request)
    {
        $employee = $this->employeeRepository->getById($request->id);
        $oldImage = $employee->avatar;
        if ($request->file('avatar')) {

            $newImage = $request->file('avatar');
            $newFileName = $newImage->getClientOriginalName();
            if ($newImage->isValid()) {
                $newFileName = $newImage->getClientOriginalName();
                Storage::disk('public')->put($newFileName, File::get($newImage));
                Storage::delete('public' . $oldImage);
            }

            $request->flash();
            $employee = collect([$request->input()]);
            $request->session()->put('editEmployee', $employee);
            $request->session()->put('newAvatar', $newFileName);
            foreach (Session::get('editEmployee') as $employee) {
                $team_id = $employee['team_id'];
            }
            $team = $this->teamRepository->findById($team_id);
            return view('admin.employees.edit_confirm', compact('team'));

        } else {
            $request->flash();
            $employee = collect([$request->input()]);
            $request->session()->put('editEmployee', $employee);
            $request->session()->put('newAvatar', $oldImage);
            foreach (Session::get('editEmployee') as $employee) {
                $team_id = $employee['team_id'];
            }
            $team = $this->teamRepository->findById($team_id);
            return view('admin.employees.edit_confirm', compact('team'));
        }
    }

    public function editConfirmSave($id, Request $request)
    {
        try {

            $employee = $this->employeeRepository->getById($request->id);
            $result = $this->employeeRepository->update($id, $request->input());
            if ($employee->email !== $result->email) {
                $emailJob = new EmployeeJob($employee);
                dispatch($emailJob);
            }
            return redirect()->route('admin.employee.search')->with('message', config('messages.update_success'));
        } catch (\Exception $exception) {
            $error = config('messages.update_not_list') . $exception->getCode();
            Log::error($error);
            return redirect()->route('admin.employee.search')->with('error', $error);
        }
    }

    public function delete($id)
    {
        try {
            $result = $this->employeeRepository->delete($id);
            if ($result) {
                return redirect()->route('admin.employee.search')->with('message', config('messages.delete_success'));
            } else {
                return redirect()->route('admin.employee.search')->with('error', config('messages.delete_failed'));
            }
        } catch (\Exception $exception) {
            $error = config('messages.delete_not_list') . $exception->getCode();
            Log::error($error);
            return redirect()->route('admin.employee.search')->with('error', $error);
        }
    }

    public function exportCSV(Request $request)
    {

        $fileName = 'employees.csv';
        $request->only('team', 'name', 'email');
        $employees = $this->employeeRepository->search($request);
        $headers = [
            "Content-Encoding: UTF-8",
            "Content-type" => "text/csv, charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['id', 'team', 'name', 'email'];

        $callback = function () use ($employees, $columns) {
            $file = fopen('php://output', 'w');

            fputs($file, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
            fputcsv($file, $columns);

            foreach ($employees as $employee) {
                $row['id'] = $employee->id;
                $row['team'] = $employee->team->name;
                $row['name'] = $employee->fullname;
                $row['email'] = $employee->email;
                fputcsv($file, [$row['id'], $row['team'], $row['name'], $row['email']]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);

    }
}
