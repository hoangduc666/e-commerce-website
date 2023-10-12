<?php

namespace App\Repositories\Eloquent;

use App\Models\Discount;
use App\Repositories\Contracts\AdminRepositoryInterface;
use App\Repositories\Contracts\DiscountRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DiscountRepository extends AbstractRepository implements DiscountRepositoryInterface
{

    public function __construct(Discount $discount)
    {
        parent::__construct($discount); // TODO: Change the autogenerated stub
    }

    public function queryList(array $data)
    {
        return $this->model->query()
            ->when(!empty($data['name']), function ($query) use ($data) {
                $query->where('name', 'like', '%' . $data['name'] . '%');
            })->orderByDesc('id');
    }


}
