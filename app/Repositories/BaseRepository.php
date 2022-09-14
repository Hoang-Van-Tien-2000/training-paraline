<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;


class BaseRepository implements RepositoryInterface
{

    protected $_model;

    public function getModel()
    {
        return app()->make($this->_model);
    }

    public function findById($id)
    {
        return $this->getModel()->findOrFail($id);
    }

    public function create(array $attributes)
    {
        $attributes['ins_id'] = Auth::id();
        $attributes['ins_datetime'] = date("Y-m-d H:i:s");

        return $this->getModel()->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $model = $this->getModel()->find($id);
        if (empty($model)) {
            return false;
        }

        $attributes['upd_id'] = Auth::id();
        $attributes['upd_datetime'] = date("Y-m-d H:i:s");
        $model->update($attributes);
        return $model;
    }

    public function delete($id)
    {
        $model = $this->getModel()->find($id);
        if(empty($model))
        {
            return false;
        }
        $model->del_flag = config('constant.DELETED_ON');
        $this->update($id, $model);
        return $model;
    }
}