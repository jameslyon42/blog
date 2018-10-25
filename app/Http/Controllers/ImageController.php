<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Store a newly created image in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $image_path_info = pathinfo($image->getClientOriginalName());

        $image_storage = Storage::disk('images');

        do {
            $id = uniqid('IMAGE_');
            $filename = $id . '.' . $image_path_info['extension'];
        } while ($image_storage->exists($filename));

        $image->storeAs('/', $filename, 'images');

        $url = $image_storage->url($filename);

        return response()->json(compact('url'));
    }
}
