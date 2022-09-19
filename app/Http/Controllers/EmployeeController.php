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
        if ($request->file('avatar')) {
            $file = $request->file('avatar');

            if ($file->isValid()) {
                $fileName = $file->getClientOriginalName();
                Storage::disk('public')->put($fileName, File::get($file));
            }
        }
        $request->flash();
        $employee = collect([$request->input()]);
        $employee = $employee->merge($fileName);
        session(['addEmployee' => $employee]);
        $team = $this->teamRepository->findById(Session::get('addEmployee')['0']['team_id']);
        return view('admin.employees.create_confirm', compact('team'));

    }

    public function addConfirmSave(Request $request)
    {
        try {
            $employee = $this->employeeRepository->create($request->all());
            if ($employee) {
                $emailJob = new EmployeeJob($employee);
                dispatch($emailJob);
            }

            return redirect()->route('admin.employee.search')->with('message', config('messages.create_success'));
        } catch (QueryException $e) {
            $error = $e->errorInfo;
            Log::error('Message: ' . $exception->getMessage() . ' Line : ' . $exception->getLine());
            return redirect()->back()->with('error', $error);
        }
    }

    public function search(Request $request)
    {
        try {
            $teams = $this->teamRepository->getAll();
            $request->flash();
            $employees = $this->employeeRepository->search($request);
            return view('admin.employees.search', compact('employees', 'teams'));
        } catch (ModelNotFoundException $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' Line : ' . $exception->getLine());
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $employee = $this->employeeRepository->getById($id);
        $teams = $this->teamRepository->getAll();
        return view('admin.employees.edit', compact('employee', 'teams'));
    }

    public function editConfirm(EmployeeRequest $request)
    {
        $request->flash();
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

            $employee = collect([$request->input()]);
            $employee = $employee->merge($newFileName);
            $request->session()->put('editEmployee', $employee);
            $team = $this->teamRepository->findById(Session::get('editEmployee')['0']['team_id']);
            return view('admin.employees.edit_confirm', compact('team'));

        } else {

            $employee = collect([$request->input()]);
            $employee = $employee->merge($oldImage);
            $request->session()->put('editEmployee', $employee);
            $team = $this->teamRepository->findById(Session::get('editEmployee')['0']['team_id']);
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
            Log::error('Message: ' . $exception->getMessage() . ' Line : ' . $exception->getLine());
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
            Log::error('Message: ' . $exception->getMessage() . ' Line : ' . $exception->getLine());
            return redirect()->route('admin.employee.search')->with('error', $error);
        }
    }

    public function exportCSV(Request $request)
    {

        $fileName = 'employees.csv';
        $employees = $this->employeeRepository->search($request);
        $headers = [
            "Content-Encoding: UTF-8",
            "Content-type" => "text/csv, charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['id',
            'team',
            'name',
            'email',
            'gender',
            'birthday',
            'address',
            'avatar',
            'salary',
            'position',
            'type_of_work',
            'status'
        ];

        $callback = function () use ($employees, $columns) {
            $file = fopen('php://output', 'w');

            fputs($file, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
            fputcsv($file, $columns);

            foreach ($employees as $employee) {
                $row['id'] = $employee->id;
                $row['team'] = $employee->team->name;
                $row['name'] = $employee->fullname;
                $row['email'] = $employee->email;

                $genders = [1 => 'Male', 2 => 'Female'];
                foreach ($genders as $key => $value) {
                    if ($employee->gender == $key) {
                        $row['gender'] = $value;
                    }
                }

                $row['birthday'] = $employee->birthday;
                $row['address'] = $employee->address;
                $row['avatar'] = $employee->avatar;
                $row['salary'] = $employee->salary;

                $positions = [1 => 'Manager', 2 => 'Team Leader', 3 => 'BSE', 4 => 'Dev', 5 => 'Tester'];
                foreach ($positions as $key => $value) {
                    if ($employee->position == $key) {
                        $row['position'] = $value;
                    }
                }

                $type_of_works = [1 => 'Full Time', 2 => 'Part Time', 3 => 'Probationary Staff', 4 => 'Intern'];
                foreach ($type_of_works as $key => $value) {
                    if ($employee->type_of_work == $key) {
                        $row['type_of_work'] = $value;
                    }
                }

                $status = [0 => 'On Working', 1 => 'Retired'];
                foreach ($status as $key => $value) {
                    if ($employee->status == $key) {
                        $row['status'] = $value;
                    }
                }

                fputcsv($file, [
                    $row['id'],
                    $row['team'],
                    $row['name'],
                    $row['email'],
                    $row['gender'],
                    $row['birthday'],
                    $row['address'],
                    $row['avatar'],
                    $row['salary'],
                    $row['position'],
                    $row['type_of_work'],
                    $row['status']
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);

    }
}
