<?php

namespace App\Repositories;

use App\Models\Team;
use Illuminate\Support\Facades\Session;

class TeamRepository extends BaseRepository
{

    public function __construct()
    {
        $this->_model = Team::class;
    }

    public function getAll()
    {
        return $this->getModel()->select('id', 'name')->get();
    }

    public function search($request)
    {
        if (empty($request)) {
            return $this->getModel()->select('id', 'name')->Paginate(config('constant.LIMIT_PER_PAGE'));
        }
        return $this->getModel()->select('id', 'name')->when(!empty($request['name']), function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request['name'] . '%');
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

    public function findById($id)
    {
        return $this->getModel()->findOrFail($id);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        request()->session()->forget('addTeam');
        return parent::create($attributes);
    }

    public function update($id, $attributes)
    {
        Session::forget('editTeam');
        return parent::update($id, $attributes);
    }

    public function delete($id)
    {
        return parent::delete($id);
    }
}
