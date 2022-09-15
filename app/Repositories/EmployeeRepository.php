<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EmployeeRepository extends BaseRepository
{
    public function __construct()
    {
        $this->_model = Employee::class;
    }


    public function getAll()
    {
        return $this->getModel()->select('id', 'name')->where('del_flag', config('constant.DELETED_OFF'))->get();
    }

    public function search($conditions)
    {
        if (empty($conditions)) {
            return $this->getModel()->select('id', 'team_id', 'first_name', 'last_name', 'email')
                ->Paginate(config('constant.PER_PAGE'));
        } elseif ($conditions['team']) {
            return $this->getModel()->select('id', 'team_id', 'first_name', 'last_name', 'email')
                ->where('team_id', $conditions['team'])->Paginate(config('constant.PER_PAGE'));
        } elseif ($conditions['name']) {
            return $this->getModel()->select('id', 'team_id', 'first_name', 'last_name', 'email')
                ->where('first_name', 'like', $conditions['name'])->Paginate(config('constant.PER_PAGE'));
        } elseif ($conditions['email']) {
            return $this->getModel()->select('id', 'team_id', 'first_name', 'last_name', 'email')
                ->where('email', 'like', $conditions['email'])->Paginate(config('constant.PER_PAGE'));
        }
        return $this->getModel()->select('id', 'team_id', 'first_name', 'last_name', 'email')
            ->Paginate(config('constant.PER_PAGE'));
    }

    public function getById($id)
    {
        return $this->getModel()->where('id', $id)->first();
    }

    public function create(array $attributes)
    {
        Session::forget('addEmployee');
        Session::forget('avatar');
        $attributes['email'] = Auth::user()->email;
        $attributes['password'] = Auth::user()->password;
        return parent::create($attributes);
    }

    public function updateData($data, $id)
    {
        Session::forget('editEmployee');
        $employee = $this->getModel()->find($id);
        if (empty($team)) {
            return;
        }

        $employee->name = $data['name'];
        $employee->update();
        return $employee;
    }

    public function delete($id)
    {
        $employee = $this->getModel()->find($id);
        if (empty($employee)) {
            return;
        }

        $employee->del_flag = config('constant.DELETED_ON');
        $employee->update();
        return $employee;
    }
}