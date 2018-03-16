<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['file_name', 'mime_type', 'file_size', 'file_path', 'status', 'type'];

//    public function file(){
//        return $this->belongsTo('App\Gallery');
//    }
    public function uploadThumbAndMainImage(Request $request)
    {
        $storage = Storage::disk('public');
        $file = $request->file('file');
        $extension = $request->file('file')->guessExtension();
        $fileName = uniqid() . '.' . $extension;
        $mineType = $request->file('file')->getClientMimeType();
        $fileSize = $request->file('file')->getClientSize();
        $galleryId = $request->input('galleryId');
        $image = Image::make($file);
        $imageThumb = Image::make($file)->fit(320)->crop(320, 240, 0, 0);
        $imageMedium = Image::make($file)->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $imageThumb->encode($extension);
        $imageMedium->encode($extension);
        $image->encode($extension);

        $storage->put("galley_{$galleryId}/main/" . $fileName, (string) $image);
        $storage->put("galley_{$galleryId}/medium/" . $fileName, (string) $imageMedium);
        $storage->put("galley_{$galleryId}/thumb/" . $fileName, (string) $imageThumb);

        $file = File::create([
            'file_name' => $fileName,
            'mime_type' => $mineType,
            'file_size' => $fileSize,
            'file_path' => Storage::disk('public')->get("galley_{$galleryId}/main/" . $fileName),
            'type' => 'local'
        ]);

        DB::table('gallery_images')->insert([
            'gallery_id' => $galleryId,
            'file_id' => $file->id,
        ]);

        $fileImg = File::find($file->id);
        $fileImg->status = 1;
        $fileImg->save();
        return [$file => $file,
            'thumb' => "/uploadedimages/main/" . $fileName,
            'medium' => "/uploadedimages/medium/" . $fileName,
            'main' => "/uploadedimages/main/" . $fileName
        ];
    }
}


