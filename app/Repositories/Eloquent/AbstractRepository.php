<?php

namespace App\Repositories\Eloquent;


use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


abstract class AbstractRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function queryList(array $data)
    {

    }

    public function create(array $data)
    {

    }

    public function insert(array $data)
    {
        return $this->model->create($data);
    }

    public function find($condition)
    {

    }

    public function findOrFail($condition, $return = 0, $columns = ['*'])
    {
        return $this->model->findOrFail($condition, $columns);
    }

    public function update($id, array $data)
    {
        $model = $this->findOrFail($id);
        $model->update($data);
        return $model;
    }

    public function delete($id)
    {
        $model = $this->findOrFail($id);

        return $model->delete();
    }

    public function destroy(array $ids)
    {

    }

    public function edit($id)
    {
        return $this->model->findOrFail($id);
    }

}
