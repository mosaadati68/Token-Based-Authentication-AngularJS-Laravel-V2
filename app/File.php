<?php

namespace App;

use Image;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['file_name', 'mime_type', 'file_size', 'file_path', 'status', 'type'];

//    public function file(){
//        return $this->belongsTo('App\Gallery');
//    }
    public function uploadThumbAndMainImage($request)
    {
        $file = $request->file('file');
        $extension = $request->file('file')->guessExtension();
        $fileName = uniqid() . '.' . $extension;
        $mineType = $request->file('file')->getClientMimeType();
        $fileSize = $request->file('file')->getClientSize();
        $image = Image::make($file);
        $galleryId = $request->input('gallerId');

        $imageThumb = Image::make($file)->fit(320)->crop(320, 240, 0, 0);
        $imageThumb->encode($extension);

        $imageMedium = Image::make($file)->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $imageMedium->encode($extension);
        $image->encode($extension);


        $image->save(public_path('/uploadedimages/main'),(string) $image);
        $imageMedium->save(public_path('/uploadedimages/medium'),(string) $imageMedium);
        $imageThumb->save(public_path('/uploadedimages/thumb'),(string) $imageThumb);

        $file = File::create([
            'file_name' => $fileName,
            'mime_type' => $mineType,
            'file_size' => $fileSize,
            'file_path' => public_path('/uploadedimages/main'. $image),
            'type' => 'public'
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


