<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as Files;

class File extends Model
{
    protected $fillable = ['file_name', 'mime_type', 'file_size', 'file_path', 'status', 'type'];

    /**
     * @param Request $request
     */
    public function uploadThumbAndMainImage(Request $request)
    {
        $storage = Storage::disk('public');
        $file = $request->file('file');
        $extension = $request->file('file')->guessExtension();
        $fileName = uniqid() . '.' . $extension;
        $mineType = $request->file('file')->getClientMimeType();
        $fileSize = $request->file('file')->getClientSize();
        $galleryId = $request->input('galleryId');

        $destMainPath = public_path("images/gallery_{$galleryId}/main");
        $destMediumPath = public_path("images/gallery_{$galleryId}/medium");
        $destThumbPath = public_path("images/gallery_{$galleryId}/thumb");

        if (!Files::exists($destMainPath)) {
            Files::makeDirectory($destMainPath, $mode = 0777, true);
        }

        if (!Files::exists($destMediumPath)) {
            Files::makeDirectory($destMediumPath, $mode = 0777, true);
        }

        if (!Files::exists($destThumbPath)) {
            Files::makeDirectory($destThumbPath, $mode = 0777, true);
        }
        $Img = Image::make($file->getRealPath());
        $Img->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destMediumPath . '/' . $fileName);
        $Img->fit(320)->crop(320, 240, 0, 0)->save($destThumbPath . '/' . $fileName);
        $file->move($destMainPath, $fileName);

        $file = File::create([
            'file_name' => $fileName,
            'mime_type' => $mineType,
            'file_size' => $fileSize,
            'file_path' => url("images/gallery_{$galleryId}/main/" . $fileName),
            'type' => 'local'
        ]);
        DB::table('gallery_images')->insert([
            'gallery_id' => $galleryId,
            'file_id' => $file->id,
        ]);

        $fileImg = File::find($file->id);
        $fileImg->status = 1;
        $fileImg->save();

        return ['file' => $fileImg,
            'file_id' => $file->id,
            'thumbUrl' => url("images/gallery_{$galleryId}/thumb/" . $fileName),
            'url' => url("images/gallery_{$galleryId}/medium/" . $fileName),
            'main' => url("images/gallery_{$galleryId}/main/" . $fileName)
        ];
    }

}


