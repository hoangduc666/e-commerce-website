<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{

    public function __construct(User $user)
    {
        parent::__construct($user); // TODO: Change the autogenerated stub
    }

    public function queryList(array $data)
    {
        return $this->model->orderByDesc('id');
    }

}
