<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;

use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{

    public function __construct(Category $category)
    {
        parent::__construct($category); // TODO: Change the autogenerated stub
    }

    public function queryList(array $data)
    {
        return $this->model->query()
            ->when(!empty($data['name']), function ($query) use ($data) {
                $query->where('name', 'like', '%' . $data['name'] . '%')
                    ->orWhereHas('parent', function ($q) use ($data) {
                        $q->where('name', 'like', '%' . $data['name'] . '%');
                    });
            })
            ->when(!empty($data['parent_id_null']) && $data['parent_id_null'] == true,function ($q){
                $q->whereNull('parent_id');
            })

<<<<<<< HEAD
            ->with(['parent','childrens','childrens.childrens','products'])
            ->orderBy('order','asc');
=======
            ->with(['parent','childrens'])
            ->orderByDesc('id');
>>>>>>> dece221f309a6888873a1349df77751a0356c316

    }


}
