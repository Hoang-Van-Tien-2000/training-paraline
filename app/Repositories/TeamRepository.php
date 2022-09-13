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
        return $this->getModel()->select('id', 'name')->where('del_flag', config('constant.DELETED_OFF'))->get();
    }

    public function searchByName($conditions)
    {
        if (empty($conditions)) {
            return $this->getModel()->select('id', 'name')->Paginate(config('constant.PER_PAGE'));
        }
        return $this->getModel()->select('id', 'name')->where('name', 'like', $conditions)->Paginate(2);
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
        Session::forget('addTeam');
        return parent::create($attributes);
    }

    public function update($attributes, $id)
    {
        Session::forget('editTeam');
        return parent::update($attributes, $id);
    }

    public function delete($id)
    {
        return parent::delete($id);
    }
}