<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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
                ->Paginate(config('constant.LIMIT_PER_PAGE'));
        }

        return $this->getModel()->when(!empty($request['name']), function ($q) use ($request) {
            return $q->where('first_name', 'like', '%' . $request['name'] . '%')
                ->orWhere('last_name', 'like', '%' . $request['name'] . '%')
                ->orWhere(DB::raw("concat(first_name, ' ', last_name)"), 'like', '%' . $request['name'] . '%');
        })
            ->when(!empty($request['team']), function ($q) use ($request) {
                return $q->where('team_id', $request['team']);
            })
            ->when(!empty($request['email']), function ($q) use ($request) {
                return $q->where('email', 'LIKE', '%' . $request['email'] . '%');
            })
            ->when(!empty($request['sort_field'] && $request['sort_type'] == 'desc'), function ($q) use ($request) {
                return $q->orderByDesc($request['sort_field']);
            })
            ->when(!empty($request['sort_field'] && $request['sort_type'] == 'asc'), function ($q) use ($request) {
                return $q->orderBy($request['sort_field']);
            })
            ->Paginate(config('constant.LIMIT_PER_PAGE'));
    }

    public function getById($id)
    {
        return $this->getModel()->where('id', $id)->first();
    }

    public function create(array $attributes)
    {
        $attributes['avatar'] = session()->get('addEmployee')['file_name'];
        $attributes['password'] = Auth::user()->password;
        $attributes['email'] = Auth::user()->email;
        session()->forget('addEmployee');
        session()->forget('currentImgUrl');

        return parent::create($attributes);
    }

    public function update($id, $attributes)
    {
        $attributes['avatar'] = session()->get('editEmployee')['file_name'];
        $attributes['email'] = Auth::user()->email;
        $attributes['password'] = Auth::user()->password;
        session()->forget('editEmployee');
        session()->forget('currentImgUrl');

        return parent::update($id, $attributes);
    }

    public function delete($id)
    {
        return parent::delete($id);
    }

    public function resetAddEdit($request)
    {

        session()->forget('addEmployee');
        session()->forget('editEmployee');
        session()->forget('currentImgUrl');
    }
}
