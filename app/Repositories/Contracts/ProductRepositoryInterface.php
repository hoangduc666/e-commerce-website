<?php

namespace App\Repositories\Contracts;

use App\Models\Product;
use App\Repositories\Eloquent\BaseEloquentRepository;
use Illuminate\Http\Request;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function changeStatus($id);
    public function copy($id);
    public function getParentProductAttribute($parent);
    public function getChildProductAttribute($parent);
    public function detailBySlug($slug);

}

