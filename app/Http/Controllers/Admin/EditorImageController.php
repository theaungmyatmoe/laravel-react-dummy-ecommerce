<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditorImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        $image = $request->file('editor_image');
        $image_name = uniqid() . $image->getClientOriginalName();
        $image->move(public_path('/images'), $image_name);

        return response()->json(
            [
                'image_url' => asset('/images/' . $image_name)
            ]);
    }
}
