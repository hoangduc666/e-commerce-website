<?php

namespace App\Repositories\Contracts;

interface MediaRepositoryInterface extends BaseRepositoryInterface
{

    public function uploadFile($file,$folder);

}

