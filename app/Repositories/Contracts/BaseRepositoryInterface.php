<?php

namespace App\Repositories\Contracts;
use Illuminate\Http\Request;

interface BaseRepositoryInterface
{
    public function queryList(array $data);

    public function insert(array $data);

    public function find($condition);

    public function findOrFail($condition, $return = 0, $columns = ['*']);

    public function update($id, array $data);

    public function delete($id);

    public function destroy(array $ids);

    public function edit($id);

}

