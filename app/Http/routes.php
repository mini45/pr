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

//    Route::get('news',function(){
//        return view('news');
//    });
    Route::get('news',['as'=>'news','uses'=>'MainController@getNews']);
});



