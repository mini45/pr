<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
use Auth;
use App\Image as ImageDB;
use Validator;


class ImageController extends Controller
{


    public function getThumbnail($filename)
    {
        $path = storage_path() . '\thumbnails\\' . $filename;

        return Image::make($path)->response();
    }


    public function getGallerie($tag = 'all')
    {
        return view('gallerie',compact('tag'));
    }

    public function uploadImage(Request $request)
    {
        $user = Auth::user();
        //dd(Request::all());
        if($request->hasFile('images'))
        {

            $files = $request->file('images');


            foreach ($files as $file) {
                $path = storage_path().'\gallerie\\';

                $rules = array('file' => 'image'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(array('file'=> $file), $rules);

                if($validator->passes()){

                    $image = ImageDB::create([
                        'user'=>$user->id,
                    ]);
                    $image->save();
                    $path = $path.$image->id.'.'.$file->getClientOriginalExtension();
                    $image->path = $path;
                    $image->save();

                    Image::make($file)->resize(640,640)->save($path);


                }

                if ($validator->fails()) {

                }
            }

//
//            Image::make($file)->resize(50,50)->save($path.$filename);

        }
    }
}
