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

    public function searchByName($name)
    {
        if (empty($name)) {
            return $this->getModel()->select('id', 'name')->Paginate(config('constant.LIMIT_PER_PAGE'));
        }
        return $this->getModel()->select('id', 'name')->where('name', 'like', $name)->Paginate(config('constant.LIMIT_PER_PAGE'));
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
