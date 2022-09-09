<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TeamRepository extends  BaseRepository
{
    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function model()
    {
        return Team::class;
    }

    public function getAll()
    {
        return $this->team->select('id', 'name')->where('del_flag', config('constant.DELETED_OFF'))->get();
    }

    public function seachByName($data)
    {
        if (empty($data)) {
            return $this->team->select('id', 'name')->where('del_flag', config('constant.DELETED_OFF'))->Paginate(2);
        }
        return $this->team->select('id', 'name')->where('del_flag', config('constant.DELETED_OFF'))
            ->where('name', 'like', $data)->Paginate(2);
    }

    public function getById($id)
    {
        return $this->team->where('id', $id)->first();
    }

    public function create(array $data)
    {
        Session::forget('addTeam');
        $data['ins_id'] = Auth::id();
        $data['ins_datetime'] = date("Y-m-d H:i:s");
        
        return $this->team->create($data);
    }

    public function updateData($data, $id)
    {
        Session::forget('editTeam');
        $team = $this->team->find($id);
        if (empty($team)) {
            return; 
        }

        $team->name = $data['name'];
        $team->update();
        return $team;
    }

    public function delete($id)
    {
        $team = $this->team->find($id);
        if(empty($team))
        {
            return; 
        }
        
        $team->del_flag = config('constant.DELETED_ON');
        $team->update();
        return $team;
    }
}