<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Support\Facades\Auth;
use App\Gallery;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Gallery::where('user_id', '1')->with('user')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        response($user = Auth::id());
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return response($validator->errors()->all(), 422);
        }

        $gallery = Gallery::create([
            'name' => $request->input('name'),
            'user_id' => 1,
        ]);

        return response($gallery, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galleryObj = new Gallery;
        return $galleryObj->getSingleGallery($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadImage(Request $request)
    {

//        $galleryId = $request->input('galleryId');

        if (!$request->hasFile('file')) {
            return response('No file sent', 400);
        }

        if (!$request->file('file')->isValid()) {
            return response('File is not valid', 400);
        }

//        $validator = Validator::make($request->all(), [
//            'galleruId' => 'required|integer',
//            'file' => 'required|mimes:jpeg,jpg,png|max:6000',
//        ]);
//
//        if ($validator->fails()) {
//            return response('There are errors in the form', 400);
//        }

        $fileObj = new File;
        return $fileObj->uploadThumbAndMainImage($request);
    }
}
