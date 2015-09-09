<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class ProfileController extends Controller
{

    public function getProfile()
    {
        return view('profile');
    }

    public function postProfile(Request $request)
    {
        $user = Auth::user();
        //dd(Request::all());
        if($request->hasFile('pic'))
        {
            $path = storage_path().'\thumbnails\\';
            $file = $request->file('pic');
            $filename =$user->id.$user->name .'.'. $file->getClientOriginalExtension();
            Image::make($file)->resize(50,50)->save($path.$filename);
//            $file->move(storage_path().'/thumbnails',$filename);
            $user->thumbnail = $filename;

        }

        $user->save();
        return redirect()->route('profile');
    }

}
