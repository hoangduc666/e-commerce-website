<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductImageRequest;
use App\Repositories\Contracts\MediaRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class MediaController extends Controller
{
    protected $mediaRepository;

    public function __construct(MediaRepositoryInterface $mediaRepository)
    {
        $this->mediaRepository = $mediaRepository;
    }

    public function uploadFile(Request $request)
    {
        try {
            if ($request->hasFile('upload')) {
                $uploadedFile = $request->file('upload');
                $imageUrl = $this->mediaRepository->uploadFile($uploadedFile, 'product/image');

                // trả về cho ckeditor
                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = Storage::url($imageUrl);
                $msg = 'Image successfully uploaded';
                $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";


                // Render HTML output
                @header('Content-type: text/html; charset=utf-8');
                echo $re;
                return '';
            }
            return response()->json(['error' => 'No file uploaded'], 400);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), $exception->getCode());
        }
    }

    public function dropzoneIndex()
    {
        return view('admins.product.create');
    }

    public function dropzoneUpload(ProductImageRequest $request)
    {
        try {
            if ($request->hasFile('file')){
                $uploadedFile = $request->file('file');
                $imageUrl = $this->mediaRepository->uploadFile($uploadedFile, 'product/image');


                return response()->json(['success'=>'Thành công' , 'image' => $imageUrl],200);
            }
        }catch (\Exception $exception){
            return response()->json(['error' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function dropzoneDelete($id)
    {
        try {
            DB::beginTransaction();
            $this->mediaRepository->delete($id);
            DB::commit();
            return response()->json(['success' => 'Thành công'],200);
        }catch (\Exception $exception){
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()],500);
        }
    }
}
