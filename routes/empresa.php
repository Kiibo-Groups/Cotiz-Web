<?php



// Profile Section
Route::prefix(env('user'))->namespace('Empresa')->group(static function() {
    Route::middleware('auth')->group(static function () {

        /*
        |--------------------------------------------------------------------------
        | Perfil - Usuario - Empresa
        |--------------------------------------------------------------------------
        */

        Route::get('/empresa/solicitud', [App\Http\Controllers\Empresa\solicitudController::class, 'index'])->name('solicitud');
        Route::get('/empresa/servicios/ver/{id}', [App\Http\Controllers\Empresa\solicitudController::class, 'indexVer'])->name('serviciosVer');
        Route::get('/empresa/servicios/add/{id}',[App\Http\Controllers\Empresa\solicitudController::class, 'AddindexVer']);
        Route::post('/empresa/Addservicios',[App\Http\Controllers\Empresa\solicitudController::class, 'Addservicios']);


        Route::get('/empresa/users', [App\Http\Controllers\Empresa\solicitudController::class, 'usuarios'])->name('users');

        Route::get('/empresa/users/ver/{id}', [App\Http\Controllers\Empresa\solicitudController::class, 'VerUsuarioEmpresa']);
        Route::get('/empresas/credencial/{id}', [App\Http\Controllers\Admin\AdminController::class, 'verFilesfotoCredencial']);

        Route::resource('/empresa/perfil',PerfilController::class);
        Route::get('/empresa/perfil', [App\Http\Controllers\Empresa\PerfilController::class, 'index'])->name('perfil');
        Route::post('/empresa/perfil/editar', [App\Http\Controllers\Empresa\PerfilController::class, 'Actualizar'])->name('perfil_update_post');



//         /*
//         |--------------------------------------------------------------------------
//         | Our Buzón Routes
//         |--------------------------------------------------------------------------
//         */
//         Route::resource('/buzon',BuzonController::class);
//         Route::get('/buzon', [App\Http\Controllers\Empresa\BuzonController::class, 'index'])->name('buzon');
//         Route::post('/buzon/create', [App\Http\Controllers\Empresa\BuzonController::class, 'create']);


//  /*
//         |--------------------------------------------------------------------------
//         | Our Catálogos Routes
//         |--------------------------------------------------------------------------
//         */
//         Route::resource('/catalogo',CatalogoController::class);
//         Route::get('/catalogo', [App\Http\Controllers\Empresa\CatalogoController::class, 'index'])->name('catalogo');
//         Route::post('/catalogo/add', [App\Http\Controllers\Empresa\CatalogoController::class, 'storeService'])->name('catalogo_create_post');
//         Route::get('/catalogo/edit/{id}', [App\Http\Controllers\Empresa\CatalogoController::class, 'edit']);
//         Route::post('/catalogo/update', [App\Http\Controllers\Empresa\CatalogoController::class, 'updateService'])->name('catalogo_update_post');


















    });
});
