<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function getCreateedAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @param $id
     * @return Model|null|static
     */
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
            ->join('files', 'files.id', '=', 'gallery_images.file_id')
            ->get();
        $finalData = [];

        foreach ($files as $key => $file) {
            $finalData[$key] = [
                'file_id' => $file->id,
                'thumbUrl' => url("images/gallery_{$id}/main/" . $file->file_name),
                'main' => url("images/gallery_{$id}/medium/" . $file->file_name),
                'url' => url("images/gallery_{$id}/thumb/" . $file->file_name),
            ];
        }
        return $finalData;
    }
}
