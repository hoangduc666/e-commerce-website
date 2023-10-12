<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DiscountDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountRequest;
use App\Repositories\Contracts\DiscountRepositoryInterface;
use Carbon\Carbon;
use Hamcrest\Thingy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class DiscountController extends Controller
{
    protected $discountRepository;

    public function __construct(DiscountRepositoryInterface $discountRepository)
    {
        $this->discountRepository = $discountRepository;
    }

    public function index(DiscountDataTable $dataTable)
    {
        return $dataTable->render('admins.discount.list');
    }

    public function store(DiscountRequest $request){
        $dateTime = Carbon::createFromFormat('Y-m-d', $request->input('valid_until'))->format('Y-m-d h:i');
        try {
            DB::beginTransaction();
            $a = $this->discountRepository->insert($request->only(['name','percent_off','coupon_code','valid_until']));
            DB::commit();
            return response()->json(['success' => 'thành công'],200);
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()],500);
        }
    }

    public function update(DiscountRequest $request,$id){
        $data = $request->all();
        try {
            DB::beginTransaction();
            $this->discountRepository->update($id,$data);
            DB::commit();
            return response()->json(['success' => 'thành công'],200);
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()],500);
        }
    }

    public function delete($id){
        try {
            DB::beginTransaction();
            $this->discountRepository->delete($id);
            DB::commit();
            return response()->json(['success' => 'thành công'],200);
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()],500);
        }
    }

    public function getAllDiscount(Request $request){
        $data = [
            'search' => $request->input('search')
        ];
        $discount = $this->discountRepository->queryList($data)->select('id','name','coupon_code','percent_off')->get();
        return response()->json($discount);
    }
}
