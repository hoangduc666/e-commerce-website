<?php

namespace App\Repositories\Contracts;

use App\Repositories\Eloquent\BaseEloquentRepository;
use Illuminate\Http\Request;

interface AdminRepositoryInterface extends BaseRepositoryInterface
{
    public function changeStatus($id);
}

