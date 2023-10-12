<?php

namespace App\Repositories\Contracts;

use App\Repositories\Eloquent\BaseEloquentRepository;
use Illuminate\Http\Request;

interface BannerRepositoryInterface extends BaseRepositoryInterface
{
    public function changeStatus($id);
    public function incrementOrder($order);


}

