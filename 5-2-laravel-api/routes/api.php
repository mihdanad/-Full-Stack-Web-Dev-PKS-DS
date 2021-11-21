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


Route::group([
    'prefix' => 'auth',
    'namespace' => 'Auth'
], function () {

    Route::post('register', 'RegisterController')->name('auth.register');
    Route::post('regenerate-otp-code', 'RegenerateOtpCodeController')->name('auth.regenerate_otp_code');
    Route::post('verification', 'VerificationController')->name('auth.verification');
});


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
