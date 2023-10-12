<?php

namespace App\Repositories\Contracts;

use App\Models\Product;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function changeStatus($id);
    public function copy($id);
    public function getParentProductAttribute($parent);

    public function getChildProductAttribute($parent);
    public function detailBySlug($slug);

}

