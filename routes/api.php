<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function(){
	$res['success'] = true;
	$res['message'] = 'Message';
	
	return response($res);
	
});

Route::group(['prefix'=>'v1/'], function(){
	Route::post('/register', 'RegisterLombaController@register');
	Route::get('/level', 'RegisterLombaController@getLevel');
	Route::post('/video', 'VideoController@video');
	Route::post('/comment', 'VideoController@commentVideo');		
	Route::post('/vote', 'VideoController@voteVideo');
	Route::post('/response', 'VideoController@response');
	Route::post('/like', 'VideoController@likeVideo');
});

Route::group(['namespace'=>'Api'], function(){
	Route::post('/register','ApiController@register');
	Route::post('/login','ApiController@login');
});
