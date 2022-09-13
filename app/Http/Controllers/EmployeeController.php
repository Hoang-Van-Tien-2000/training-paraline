<?php

namespace App\Http\Controllers;

use App\Repositories\TeamRepository;
use App\Http\Requests\EmployeeRequest;
use App\Repositories\EmployeeRepository;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;


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
        // Xử lý upload file
        try {
            $file = $request->file('avatar');
            $storagePath = storage_path("app/public/tmp/images/");
            if (!File::isDirectory($storagePath)) {
                Storage::makeDirectory('public/tmp/images');
            }

            $randomStringTemplate = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = substr(str_shuffle(str_repeat($randomStringTemplate, 5)), 0, 5);
            $timestamp = Carbon::createFromFormat('U.u', microtime(true))->format("YmdHisu");
            $nameWithoutExtension = preg_replace("/[^a-zA-Z0-9]/", "", '') . '' . $timestamp;
            $nameWithoutExtension = $nameWithoutExtension . '-' .$randomString;
            $fileExtension = $file->guessExtension();
            $name = $nameWithoutExtension . '.' . $fileExtension;
            $name = str_replace([' ', ':', '-'], "", $name);
            try {
                $img = Image::make($file->getRealPath());
                if ($img->save($storagePath . $name)) {
                    $imageName = $name;
                }

                $imageResult = array('name' => $imageName, "error_msg" => "");
            } catch (\Exception $e) {
                $imageResult = array('name' => "", "error_msg" => $e . getMessage());
            }
             dd($imageResult['name']);
            if ($imageResult['name'] !== "" && $imageResult['error_msg'] === "") {
                $employee = collect([$request->input()]);
                $request->session()->put('addEmployee', $employee);
                foreach (Session::get('addEmployee') as $employee) {
                    $team_id = $employee['team_id'];
                }

                $team = $this->teamRepository->findById($team_id);
                $success_message = 'File Uploaded Successfully.';
                return view('admin.employees.create_confirm', compact('team'))->with('message', $success_message);
            } else {
                return redirect()->back()->with('error', 'Sorry, Something went wrong please try again');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function addConfirmSave(EmployeeRequest $request)
    {
        $this->employeeRepository->create($request->all());
        return redirect()->route('admin.employee.search')->with('message', config('messages.create_success'));
    }

    public function search()
    {
        return view('admin.employees.search');
    }


}