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

    public function search($request)
    {
        if (empty($request)) {
            return $this->getModel()->select('id', 'team_id', 'first_name', 'last_name', 'email')
                ->Paginate(config('constant.PER_PAGE'));
        }

        return $this->getModel()->when(isset($request['name']), function ($q) use ($request) {
            return $q->where('first_name', 'like', '%'. $request->name .'%');
        })
            ->when(isset($request['team']), function ($q) use ($request) {
                return $q->where('team_id', $request->team);
            })
            ->when(isset($request['email']), function ($q) use ($request) {
                return $q->where('email', 'like',  '%'.$request->email .'%');
            })
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

    public function update($id, $attributes)
    {
        Session::forget('editEmployee');
        Session::forget('avatar');
        $attributes['email'] = Auth::user()->email;
        $attributes['password'] = Auth::user()->password;

        return parent::update($id, $attributes);
    }

    public function delete($id)
    {
        return parent::delete($id);
    }
}