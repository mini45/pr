<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
//use Intervention\Image\Image;

class ImageController extends Controller
{


    public function getThumbnail($filename)
    {
        $path = storage_path() . '\thumbnails\\' . $filename;

        return Image::make($path)->response();
    }
}
