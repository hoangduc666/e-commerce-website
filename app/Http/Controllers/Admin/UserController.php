<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class UserController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admins.user.list');
    }

    // thêm
    public function store(UserStoreRequest $request){
        try {
            DB::beginTransaction();
            $a = $this->userRepository->insert($request->only(['name','email','password']));
            DB::commit();
            return response()->json(['success'=>'Thêm thành công']);
        }catch (\Exception $exception){
            DB::rollBack();

            return response()->json(['error'=>$exception->getMessage()],500);
        }
    }

    // sửa
    public function update(UserUpdateRequest $request,$id){
        $userData = $request->only(['name', 'email', 'password']);
        try {
            DB::beginTransaction();
            if (empty($userData['password'])){
                unset($userData['password']);
            }
            $this->userRepository->update($id,$userData);
            DB::commit();
            return response()->json(['success'=>'Thêm thành công']);
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['error'=>$exception->getMessage()],$exception->getCode());
        }
    }

    // xoá
    public function delete($id){
        try {
            DB::beginTransaction();
            $this->userRepository->delete($id);
            DB::commit();
            return response()->json(['success'=>'Thêm thành công']);
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['error'=>$exception->getMessage()],$exception->getCode());
        }
    }

}

