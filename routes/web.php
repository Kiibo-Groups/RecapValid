<?php

use Illuminate\Support\Facades\Route; 

Auth::routes();

/*
|--------------------------------------------------------------------------
| Rutas del panel administrativo
|--------------------------------------------------------------------------
*/

Route::group(['namespace' => 'App\Http\Controllers\Admin','prefix' => env('admin')], function(){


     
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('home');
 
    
    Route::group(['middleware' => 'auth'], function(){
        Route::get('dash',[App\Http\Controllers\Admin\AdminController::class, 'home'])->name('dash');


        /*
        |-----------------------------------------
        | Gestor de subida de archivos
        |-----------------------------------------
        */
        Route::resource('upload_xlsx','\App\Http\Controllers\Admin\UPXLSXController');
        Route::get('upload_xlsx',[App\Http\Controllers\Admin\UPXLSXController::class, 'index'])->name('upload_xlsx');
        Route::get('upload_file',[App\Http\Controllers\Admin\UPXLSXController::class, 'upload_file'])->name('upload_file');
        Route::get('upload_xlsx/delete/{id}',[App\Http\Controllers\Admin\UPXLSXController::class, 'delete']);
        Route::get('upload_xlsx/status/{id}',[App\Http\Controllers\Admin\UPXLSXController::class, 'status']); 
        Route::post('upload_file_xlsx',[App\Http\Controllers\Admin\UPXLSXController::class, 'upload_file_xlsx']);


        /*
        |-----------------------------------------
        | Account
        |-----------------------------------------
        */
        Route::resource('account','\App\Http\Controllers\Admin\AdminController');
        Route::get('account',[App\Http\Controllers\Admin\AdminController::class, 'account'])->name('account');
        Route::post('update_account',[App\Http\Controllers\Admin\AdminController::class, 'update_account']);


        /*
        |-----------------------------------------
        | Conexiones
        |-----------------------------------------
        */
        Route::resource('conns','\App\Http\Controllers\Admin\AdminController');
        Route::get('conns',[App\Http\Controllers\Admin\AdminController::class, 'conns'])->name('conns');
        Route::post('update_conns',[App\Http\Controllers\Admin\AdminController::class, 'update_conns']);
        /*
        |-----------------------------------------
        | Logout
        |-----------------------------------------
        */
        Route::get('logout',[App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('logout');
    });        
});


/*
|--------------------------------------------------------------------------
| Control de fallos
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return view('errors.404');
})->name('404_error');