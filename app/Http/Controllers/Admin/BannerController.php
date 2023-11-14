<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BannerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use App\Repositories\Contracts\BannerRepositoryInterface;
use App\Repositories\Contracts\MediaRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mockery\Exception;

class BannerController extends Controller
{
    protected $bannerRepository;
    protected $mediaRepository;

    public function __construct(
        BannerRepositoryInterface $bannerRepository,
        MediaRepositoryInterface  $mediaRepository)
    {
        $this->bannerRepository = $bannerRepository;
        $this->mediaRepository = $mediaRepository;
    }

    public function index(BannerDataTable $dataTable)
    {
//        DB::table('banners')->increment('order');
        return $dataTable->render('admins.banner.list');
    }

    public function store(BannerRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only(['order', 'alt_text']);
            $file = $this->mediaRepository->uploadFile($request->image_path, 'banner');
            $banner = $this->bannerRepository->insert($data);
            $this->mediaRepository->insert(['mediaable_id' => $banner->id, 'mediaable_type' => Banner::class, 'path' => $file]);
            DB::commit();
            return response()->json(['success' => 'Thành công'], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function changeStatus($id)
    {
        try {
            DB::beginTransaction();
            $this->bannerRepository->changeStatus($id);
            DB::commit();
            return response()->json(['success' => 'Thành công'], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }


    public function update(BannerRequest $request, $id)
    {
        $data = $request->only(['order', 'alt_text']);
        try {
            DB::beginTransaction();
            $banner = $this->bannerRepository->update($id, $data);
            if ($request->hasFile('image_path')) {
               if(Storage::disk('public')->exists(optional($banner->media)->path)){
                  Storage::disk('public')->delete(optional($banner->media)->path);
               }
                $file = $this->mediaRepository->uploadFile($request->image_path, 'banner');
                    $this->mediaRepository->update($id, [
                    'mediaable_id' => $banner->id,
                    'mediaable_type' => Banner::class,
                    'path' => $file
                ]);
            }
            DB::commit();
            return response()->json(['success' => 'Thành công'], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }


    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $this->bannerRepository->delete($id);
            $this->mediaRepository->delete($id);
            DB::commit();
            return response()->json(['success' => 'Thành công'], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
}

