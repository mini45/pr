<?php

namespace App\Http\Controllers;

use App\Tags;
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


    public function getGallerieImage($filename)
    {
        $path = storage_path() . '\gallerie\\' . $filename;

        return Image::make($path)->response();
    }

    public function getGallerieThumbnailImage($filename)
    {
        $path = storage_path() . '\gallerie\\' . $filename;

        return Image::make($path)->resize(75,75)->response();
    }


    public function getGallerie($tag = 'all')
    {
        $images = ImageDB::paginate(24);
        return view('gallerie',compact('tag','images'));
    }

    public function uploadImages(Request $request)
    {
        $user = Auth::user();
        //dd(Request::all());
        if($request->hasFile('images'))
        {
//
            $files = $request->file('images');
            $filesCount = count($files);
            $uploadCount = 0;

            foreach($files as $file)
            {
                $path = storage_path().'\gallerie\\';
                $rules = array('file' => 'image');
                $validator = Validator::make(array('file'=> $file), $rules);


                if($validator->passes()){
                    //nice this is a picture

                    $image = ImageDB::create([
                        'user'=>$user->id,
                    ]);
                    $image->save();
                    $path = $path.$image->id.'.'.$file->getClientOriginalExtension();
                    $image->path = $image->id.'.'.$file->getClientOriginalExtension();
                    $image->save();

//                    Image::make($file)->resize(640,640)->save($path);
                    Image::make($file)->save($path);
                }
                if ($validator->fails()) {
                    //faslcher Mime
                    return redirect()->back();
                }

            }


        }
        else{
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function makeNewTag(Request $request)
    {
        $data = json_decode($request->input('data'));

//        dd($data);

        Tags::create([
            'value' => $data->tag,
            'user' => Auth::user()->id,
            'image'=>$data->id
        ]);

        return 1;
    }
}
