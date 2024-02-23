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
        Route::post('upload_xlsx/download_info',[App\Http\Controllers\Admin\UPXLSXController::class, 'download_info']);
        Route::post('upload_file_xlsx',[App\Http\Controllers\Admin\UPXLSXController::class, 'upload_file_xlsx']);
        Route::get('getAllFilex',[App\Http\Controllers\Admin\UPXLSXController::class, 'getAllFilex'])->name('upload_xlsx.getAllFilex');
        Route::post('FilexSerach',[App\Http\Controllers\Admin\UPXLSXController::class, 'FilexSerach'])->name('upload_xlsx.FilexSerach');
        Route::post('FilexSearchCats',[App\Http\Controllers\Admin\UPXLSXController::class, 'FilexSearchCats'])->name('upload_xlsx.FilexSearchCats');
        Route::get('reports_filex',[App\Http\Controllers\Admin\UPXLSXController::class, 'reports_filex'])->name('upload_xlsx.reports_filex');
        Route::post('_reports_filex',[App\Http\Controllers\Admin\UPXLSXController::class, '_reports_filex']);

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