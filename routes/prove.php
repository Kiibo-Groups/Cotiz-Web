<?php



// Profile Section
Route::prefix(env('user'))->namespace('Proveedor')->group(static function() {
    Route::middleware('auth')->group(static function () {

        /*
        |--------------------------------------------------------------------------
        | Perfil - Usuario - Proveedor
        |--------------------------------------------------------------------------
        */

        Route::get('/solicitud', [App\Http\Controllers\Proveedor\solicitudController::class, 'index'])->name('solicitud');
        Route::get('/servicios/ver/{id}', [App\Http\Controllers\Proveedor\solicitudController::class, 'indexVer'])->name('serviciosVer');
        Route::get('/servicios/add/{id}',[App\Http\Controllers\Proveedor\solicitudController::class, 'AddindexVer']);
        Route::post('/Addservicios',[App\Http\Controllers\Proveedor\solicitudController::class, 'Addservicios']);

        /*
        |--------------------------------------------------------------------------
        | Our Buzón Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('/buzon',BuzonController::class);
        Route::get('/buzon', [App\Http\Controllers\Proveedor\BuzonController::class, 'index'])->name('buzon');
        Route::post('/buzon/create', [App\Http\Controllers\Proveedor\BuzonController::class, 'create']);


 /*
        |--------------------------------------------------------------------------
        | Our Catálogos Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('/catalogo',CatalogoController::class);
        Route::get('/catalogo', [App\Http\Controllers\Proveedor\CatalogoController::class, 'index'])->name('catalogo');
        Route::post('/catalogo/add', [App\Http\Controllers\Proveedor\CatalogoController::class, 'storeService'])->name('catalogo_create_post');
        Route::get('/catalogo/edit/{id}', [App\Http\Controllers\Proveedor\CatalogoController::class, 'edit'])->name('catalogo_edit');
        Route::post('/catalogo/update', [App\Http\Controllers\Proveedor\CatalogoController::class, 'updateService'])->name('catalogo_update_post');
        Route::get('/catalogo/ver/{id}', [App\Http\Controllers\Proveedor\CatalogoController::class, 'ver'])->name('catalogo_ver');

        Route::get('/catalogo/file/{id}', [App\Http\Controllers\Proveedor\CatalogoController::class, 'verFilesEmpresa']);




















    });
});
