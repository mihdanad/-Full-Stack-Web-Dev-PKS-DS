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



/**
 * route resource post
 */
Route::apiResource('/post', 'PostController');
Route::apiResource('/role', 'RoleController');
Route::apiResource('/comment', 'CommentController');

//Middleware cara pertama 
//cara kedua ada di cntrollernya masing masing

// Route::post('/post', 'PostController@store')->middleware('auth:api');
// Route::put('/post/(id)', 'PostController@update')->middleware('auth:api');
// Route::delete('/post/(id)', 'PostController@destroy')->middleware('auth:api');

// Route::post('/comment', 'commentController@store')->middleware('auth:api');
// Route::put('/comment/(id)', 'commentController@update')->middleware('auth:api');
// Route::delete('/comment/(id)', 'commentController@destroy')->middleware('auth:api');






Route::group([
    'prefix' => 'auth',
    'namespace' => 'Auth'
], function () {

    Route::post('register', 'RegisterController')->name('auth.register');
    Route::post('regenerate-otp-code', 'RegenerateOtpCodeController')->name('auth.regenerate_otp_code');
    Route::post('verification', 'VerificationController')->name('auth.verification');
    Route::post('update-password', 'UpdatePasswordController')->name('auth.update_password');
    Route::post('login', 'LoginController')->name('auth.login');
});


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
