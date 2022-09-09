<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EmployeeRepository extends  BaseRepository
{
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function model()
    {
        return Employee::class;
    }

    public function getAll()
    {
        return $this->employee->select('id', 'name')->where('del_flag', config('constant.DELETED_OFF'))->get();
    }

    public function seachByName($data)
    {
        if (empty($data)) {
            return $this->employee->select('id', 'name')->where('del_flag', config('constant.DELETED_OFF'))->Paginate(2);
        }
        return $this->employee->select('id', 'name')->where('del_flag', config('constant.DELETED_OFF'))
            ->where('name', 'like', $data)->Paginate(2);
    }

    public function getById($id)
    {
        return $this->employee->where('id', $id)->first();
    }

    public function create(array $data)
    {
        Session::forget('addTeam');
        $data['ins_id'] = Auth::id();
        $data['ins_datetime'] = date("Y-m-d H:i:s");
        
        return $this->employee->create($data);
    }

    public function updateData($data, $id)
    {
        Session::forget('editEmployee');
        $employee = $this->employee->find($id);
        if (empty($team)) {
            return; 
        }

        $employee->name = $data['name'];
        $employee->update();
        return $employee;
    }

    public function delete($id)
    {
        $employee = $this->teamemployee->find($id);
        if(empty($employee))
        {
            return; 
        }
        
        $employee->del_flag = config('constant.DELETED_ON');
        $employee->update();
        return $employee;
    }
}