<?php

namespace App\Repositories\Contracts;

use App\Models\Product;
<<<<<<< HEAD
=======
use App\Repositories\Eloquent\BaseEloquentRepository;
use Illuminate\Http\Request;
>>>>>>> dece221f309a6888873a1349df77751a0356c316

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function changeStatus($id);
<<<<<<< HEAD
    public function copy($id);
    public function getParentProductAttribute($parent);

    public function getChildProductAttribute($parent);
    public function detailBySlug($slug);
=======

>>>>>>> dece221f309a6888873a1349df77751a0356c316

}

