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
        $directoy = '/' . $request->page_id;

        do {
            $id = uniqid('IMAGE_');
            $filename = $id . '.' . $image_path_info['extension'];
        } while ($image_storage->exists($directoy . '/' . $filename));

        $image->storeAs($directoy, $filename, 'images');

        $url = $image_storage->url($directoy . '/' . $filename);

        return response()->json(compact('url'));
    }
}
