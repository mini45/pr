<?php
//use App\User;
//$user = new User;
//$user->name = 'andre';
//$user->email = 'andre.muenstermann@gmail.com';
//$user->password= bcrypt('Wqpj2080');
//$user->save();

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect(route('auth.login'));
});




Route::group(['middleware'=>'guest'],function(){
    Route::get('auth/login', ['as'=>'auth.login','uses'=>'Auth\AuthController@getLogin']);
    Route::post('auth/login', 'Auth\AuthController@postLogin');
});

Route::group(['middleware'=>'auth'],function() {
    Route::get('/', function () {
        return redirect(route('news'));
    });
    Route::get('auth/logout', ['as'=>'logout','uses'=>'Auth\AuthController@getLogout']);

    Route::get('news',['as'=>'news','uses'=>'MainController@getNews']);
    Route::post('news',['as'=>'news.save','uses'=>'MainController@newNews']);


    Route::get('events',['as'=>'events','uses'=>'MainController@getEvents']);
    Route::get('finanzen',['as'=>'finanzen','uses'=>'MainController@getFinanzen']);


    Route::get('gallerie/{tag}',['as'=>'gallerie','uses'=>'ImageController@getGallerie']);
    Route::get('gallerie',['as'=>'gallerie','uses'=>'ImageController@getGallerie']);

    Route::post('gallerie/upload',['as'=>'gallerie.upload','uses'=>'ImageController@uploadImages']);
    Route::get('gallerie/picture/{filename}','ImageController@getGallerieImage');
    Route::get('gallerie/thumbnail/picture/{filename}','ImageController@getGallerieThumbnailImage');
    Route::get('makeNewTag',['uses'=>'ImageController@makeNewTag']);


    Route::get('vote',['as'=>'vote','uses'=>'MainController@getVote']);


    Route::get('profile',['as'=>'profile','uses'=>'ProfileController@getProfile']);
    Route::post('profile',['uses'=>'ProfileController@postProfile']);


    Route::get('thumbnails/{filename}','ImageController@getThumbnail');


    Route::get('myfeed',['uses'=>'MainController@getFeed']);

    Route::get('makeNewEvent',['uses'=>'MainController@makeNewEvent']);
});



