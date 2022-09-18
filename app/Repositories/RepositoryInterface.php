<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function findById($id);
    public function create(array $attributes);
    public function update($id, array $attributes);
    public function delete(Model $model);
}
