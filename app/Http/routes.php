<?php

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
    return view('welcome');
});
 // app/Http/routes.php

//リソースコントローラーが定義されとって、thai_intern/~の形のURLは全部PostControllerのshow関数に持ってかれるから
//thai_intern/~のURLの形で呼び出すリソースコントローラー以外のルートはリソースコントローラーのルートより先に書かないかんよ。
Route::get('thai_intern/post', 'PostsController@showPosts');
Route::get('thai_intern/apply_form/{id}', 'PostsController@applyForm');
Route::resource('thai_intern', 'PostsController');
Route::get('thai_intern/category/{id}', 'PostsController@showCategory');
Route::get('thai_intern/child_category/{id}', 'PostsController@showChildCategory');
Route::get('thai_intern/region/{id}', 'PostsController@showRegion');

Route::post('thai_intern/send_application', 'MailController@sendApplication');
