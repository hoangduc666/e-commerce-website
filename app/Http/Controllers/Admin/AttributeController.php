<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AttributeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttributeRequest;
use App\Repositories\Contracts\AttributeRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;


class AttributeController extends Controller
{
    protected $attributeRepository;

    public function __construct(AttributeRepositoryInterface $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function index(AttributeDataTable $dataTable)
    {
        return $dataTable->render('admins.attribute.list');
    }

    public function store(AttributeRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $this->attributeRepository->insert($data);
            DB::commit();
            return response()->json(['success'=> 'Thành công']);
        }catch (\Exception $exception)
        {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function update(AttributeRequest $request,$id)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $this->attributeRepository->update($id,$data);
            DB::commit();
            return response()->json(['success'=>'Thành công'],200);
        }catch (\Exception $exception)
        {
            DB::rollBack();
            return response()->json(['error'=>$exception->getMessage()],500);
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $this->attributeRepository->delete($id);
            DB::commit();
            return response()->json(['success'=> 'Thành công'],200);
        }catch (\Exception $exception)
        {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()],500);
        }
    }

    public function getAllAttribute(Request $request)
    {
        $data = [
            'search' => $request->input('search')
        ];

        $attributes = $this->attributeRepository->queryList($data)->select('id','name','value')->get();

        return response()->json($attributes);
    }
}
