<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminStoreRequest;
use App\Http\Requests\Admin\AdminUpdateRequest;
use App\Models\Admin;
use App\Repositories\Contracts\AdminRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function Psy\debug;

class AdminController extends Controller
{
    protected $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function index(AdminDataTable $dataTable)
    {
        return $dataTable->render('admins.admin.list');
    }


    //thêm
    public function store(AdminStoreRequest $request)
    {
        try {
            //nếu có lỗi thì quay lại trạng thái ban đầu của csdl
            DB::beginTransaction();
            $this->adminRepository->insert($request->all());
            DB::commit();
            return response()->json(['success' => 'Thêm thành công']);
        } catch (\Exception $exception) {
            //nếu có lỗi trong quá trình chạy thì sẽ quay lại trạng thái ban đầu (tránh dữ liệu bị thay đổi)
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], $exception->getCode());
        }
    }


    //handle show edit page post
    public function update(AdminUpdateRequest $request, $id)
    {
        $adminData = $request->only(['name', 'email', 'password']);

        try {
            DB::beginTransaction();
            if (empty($adminData['password'])) {
                unset($adminData['password']);
            }
            $this->adminRepository->update($id,$adminData);

            DB::commit();

            return response()->json(['success' => 'Cập nhật thành công']);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }


    public function delete($id){
        try {
            DB::beginTransaction();
            $this->adminRepository->delete($id);
            DB::commit();
            return response()->json(['success' => 'Xóa thành công']);
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['error'=> 'Thực hiện xóa bị lỗi:'.$exception->getMessage()],500);
        }
    }
    public function changeStatus($id){
        try {
            DB::beginTransaction();
            $this->adminRepository->changeStatus($id);
            DB::commit();
            return response()->json(['success' => 'Cập nhật thành công']);
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['error'=> $exception->getMessage()],500);
        }
    }


}

