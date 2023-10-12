<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\MediaRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

}
