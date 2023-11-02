<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    protected $categoryRepository;


    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admins.category.list');
    }

    public function getAllCategory(Request $request)
    {
        $data = [
            'search' => $request->input('search')
        ];

        $categories = $this->categoryRepository->queryList($data)->select('id','name')->get();

        return response()->json($categories);
    }

    public function store(CategoryRequest $request)
    {
        try {
            DB::beginTransaction();
<<<<<<< HEAD
            $this->categoryRepository->insert($request->only(['parent_id','name','order']));
=======
            $this->categoryRepository->insert($request->only(['parent_id','name']));
>>>>>>> dece221f309a6888873a1349df77751a0356c316
            DB::commit();
            return response()->json(['success'=>'Thành công']);
        }catch (\Exception $exception)
        {
            DB::rollBack();
            return response()->json(['error'=>$exception->getMessage()],$exception->getCode());
        }
    }

    public function update(CategoryRequest $request,$id)
    {
<<<<<<< HEAD
        $categoryData = $request->only(['parent_id', 'name','order']);
=======
        $categoryData = $request->only(['parent_id', 'name']);
>>>>>>> dece221f309a6888873a1349df77751a0356c316

        try {
            DB::beginTransaction();
            $this->categoryRepository->update($id,$categoryData);
            DB::commit();
            return response()->json(['success'=>'Thành công']);
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['error'=> $exception->getMessage()],500);
        }
    }

    public function delete($id){
        try {
            DB::beginTransaction();
            $this->categoryRepository->delete($id);
            DB::commit();
            return response()->json(['success' => 'Xóa thành công']);
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['error'=> 'Thực hiện xóa bị lỗi:'.$exception->getMessage()],500);
        }
    }
}
