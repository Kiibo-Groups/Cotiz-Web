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


        Route::get('/usuarios', [App\Http\Controllers\Proveedor\solicitudController::class, 'usuarios'])->name('usuarios');
        Route::get('/users/ver/{id}', [App\Http\Controllers\Proveedor\solicitudController::class, 'VerUsuarioProveedor']);
        Route::get('/users/ver/proveedor/{id}', [App\Http\Controllers\Proveedor\solicitudController::class, 'VerUsuarioProveedor']);
        Route::get('/empresas/credencial/{id}', [App\Http\Controllers\Admin\AdminController::class, 'verFilesfotoCredencial']);



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

        Route::get('/catalogo/delete/{id}', [App\Http\Controllers\Proveedor\CatalogoController::class, 'delete']);

        Route::get('/catalogo/file/{id}', [App\Http\Controllers\Proveedor\CatalogoController::class, 'verFilesEmpresa']);
        Route::get('/catalogo/referencias/{id}',[App\Http\Controllers\Proveedor\CatalogoController::class, 'AddReferencias'])->name('add_referencias');

        Route::post('/catalogo/add/referencias', [App\Http\Controllers\Proveedor\CatalogoController::class, 'storeServiceReferencias'])->name('catalogo_referencia_post');

        Route::get('/catalogo/certificados/{id}',[App\Http\Controllers\Proveedor\CatalogoController::class, 'AddCertificados'])->name('add_certificados');
        Route::post('/catalogo/add/certificados', [App\Http\Controllers\Proveedor\CatalogoController::class, 'storeServiceCertificados'])->name('catalogo_certificados_post');

        Route::get('/catalogo/certificados/file/{id}', [App\Http\Controllers\Proveedor\CatalogoController::class, 'verFilesCertificados']);



        Route::resource('/proveedor/perfil',PerfilController::class);
        Route::get('/proveedor/perfil', [App\Http\Controllers\Proveedor\PerfilController::class, 'index'])->name('perfil');
        Route::post('/proveedor/perfil/editar', [App\Http\Controllers\Proveedor\PerfilController::class, 'Actualizar'])->name('perfil_prove_update_post');



    Route::get('/catalogo/file2/{id}', [App\Http\Controllers\Proveedor\CatalogoController::class, 'verFilesEmpresa2']);
        Route::get('/catalogo/file3/{id}', [App\Http\Controllers\Proveedor\CatalogoController::class, 'verFilesEmpresa3']);
        Route::get('/catalogo/file4/{id}', [App\Http\Controllers\Proveedor\CatalogoController::class, 'verFilesEmpresa4']);
        Route::get('/catalogo/file5/{id}', [App\Http\Controllers\Proveedor\CatalogoController::class, 'verFilesEmpresa5']);
        Route::get('/catalogo/file6/{id}', [App\Http\Controllers\Proveedor\CatalogoController::class, 'verFilesEmpresa6']);
        Route::get('/catalogo/file7/{id}', [App\Http\Controllers\Proveedor\CatalogoController::class, 'verFilesEmpresa7']);
        Route::get('/catalogo/file8/{id}', [App\Http\Controllers\Proveedor\CatalogoController::class, 'verFilesEmpresa8']);






        Route::get('/empresas/gafete/{id}', [App\Http\Controllers\Admin\AdminController::class, 'verFilesGafete']);
        Route::get('/empresas/credencial/{id}', [App\Http\Controllers\Admin\AdminController::class, 'verFilesfotoCredencial']);
        Route::get('/empresas/gafete2/{id}', [App\Http\Controllers\Admin\AdminController::class, 'verFilesGafete2']);
        Route::get('/empresas/credencial2/{id}', [App\Http\Controllers\Admin\AdminController::class, 'verFilesfotoCredencial2']);














    });
});
