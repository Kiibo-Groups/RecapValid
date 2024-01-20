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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

 

Route::group(array('namespace' => 'App\Http\Controllers\Api'), function () {

    Route::get('welcome','ApiController@welcome');
    Route::get('getToken','ApiController@getToken');
    Route::post('getFilesXlsx','ApiController@getFilesXlsx');
});