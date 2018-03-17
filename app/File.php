<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

//        $imageThumb->encode($extension);
//        $imageMedium->encode($extension);
//        $image->encode($extension);

        $storage->put("gallery_{$galleryId}/main/" . $fileName, (string)$image);
        $storage->put("gallery_{$galleryId}/medium/" . $fileName, (string)$imageMedium);
        $storage->put("gallery_{$galleryId}/thumb/" . $fileName, (string)$imageThumb);

        $file = File::create([
            'file_name' => $fileName,
            'mime_type' => $mineType,
            'file_size' => $fileSize,
            'file_path' => Storage::disk('public')->url("gallery_{$galleryId}/main/" . $fileName),
            'type' => 'local'
        ]);


        DB::table('gallery_images')->insert([
            'gallery_id' => $galleryId,
            'file_id' => $file->id,
        ]);

        $fileImg = File::find($file->id);
        $fileImg->status = 1;
        $fileImg->save();

        $thumb = Storage::disk('public')->url("gallery_{$galleryId}/main/" . $fileName);
        $main = Storage::disk('public')->url("gallery_{$galleryId}/medium/" . $fileName);
        $medium = Storage::disk('public')->url("gallery_{$galleryId}/thumb/" . $fileName);

        return ['file' => $file,
            'thumb' => $thumb,
            'medium' => $medium,
            'main' => $main
        ];
    }

    public function getSingleGallery($id)
    {
        $gallery = Gallery::with('user')->where('id', $id)->first();
        $gallery->images = $this->getGalleryImageUrls($id);
        return $gallery;
    }

    private function getGalleryImageUrls($id)
    {
        $files = DB::table('gallery_images')
            ->where('gallery_id', $id)
            ->join('files', 'files_id', '=', 'gallery_images.file_id')
            ->get();

        return $files;
    }
}


