<?php



// Profile Section
Route::prefix(env('user'))->namespace('Prueba')->group(static function() {
    Route::middleware('auth')->group(static function () {

        /*
        |--------------------------------------------------------------------------
        | Perfil - Usuario - Empresa
        |--------------------------------------------------------------------------
        */

        Route::get('/prueba/solicitud', [App\Http\Controllers\Empresa\solicitudController::class, 'indexPrueba'])->name('solicitudprueba');
        Route::get('/prueba/servicios/ver/{id}', [App\Http\Controllers\Empresa\solicitudController::class, 'indexVerPrueba'])->name('serviciosVers');
        Route::get('/prueba/servicios/add/{id}',[App\Http\Controllers\Empresa\solicitudController::class, 'AddindexVer']);
        Route::post('/prueba/Addservicios',[App\Http\Controllers\Empresa\solicitudController::class, 'Addservicios']);


        Route::get('/prueba/users', [App\Http\Controllers\Empresa\solicitudController::class, 'usuarios'])->name('users');

        Route::get('/prueba/users/ver/{id}', [App\Http\Controllers\Empresa\solicitudController::class, 'VerUsuarioEmpresa']);
        Route::get('/pruebas/credencial/{id}', [App\Http\Controllers\Admin\AdminController::class, 'verFilesfotoCredencial']);

        Route::resource('/prueba/perfil',PerfilController::class);
        Route::get('/prueba/perfil', [App\Http\Controllers\Empresa\PerfilController::class, 'index'])->name('perfil');
        Route::post('/prueba/perfil/editar', [App\Http\Controllers\Empresa\PerfilController::class, 'Actualizar'])->name('perfil_update_post');

















    });
});
