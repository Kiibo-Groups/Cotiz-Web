<?php


include("admin.php");
include("prove.php");
include("empresa.php");

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
//Route::get('dash',[App\Http\Controllers\Admin\AdminController::class, 'home']);
// Index Section
Route::get('/', [App\Http\Controllers\Controller::class, 'home'])->name('init');
Route::get('/home', [App\Http\Controllers\Controller::class, 'home'])->name('init');
Route::get('/dash', [App\Http\Controllers\Controller::class, 'home'])->name('init');

// Vista del elemento
Route::get('/viewprod/{prod}/{tit}', [App\Http\Controllers\Controller::class, 'viewprod']);

// Busqueda de productos
Route::get('/search', [App\Http\Controllers\Controller::class, 'searchProd'])->name('search');

// Register Section
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register_get');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register_post');
Route::get('/seccion', [App\Http\Controllers\Auth\RegisterController::class, 'createSeccion'])->name('seccion_get');
Route::get('/registerp', [App\Http\Controllers\Auth\RegisterController::class, 'createProveedor'])->name('registerprove_get');
Route::post('register/proveedor/usuario', [App\Http\Controllers\Auth\RegisterController::class, 'storeProveedorUser'])->name('register_post_proveedor_usuario');
Route::post('register/prueba', [App\Http\Controllers\Auth\RegisterController::class, 'storePrueba'])->name('register_post_prueba');


Route::get('/register/rfc', [App\Http\Controllers\Auth\RegisterController::class, 'buscarRfc'])->name('register.rfc');
Route::post('register/empresa', [App\Http\Controllers\Auth\RegisterController::class, 'storeEmpresa'])->name('register_empresa');
Route::post('register/proveedor', [App\Http\Controllers\Auth\RegisterController::class, 'storeProveedor'])->name('register_proveedor');




// Contact Section
Route::get('/contact', [App\Http\Controllers\Controller::class, 'contact'])->name('contact');
Route::post('/contact', [App\Http\Controllers\Controller::class, '_contact']);
Route::get('/activar', [App\Http\Controllers\Profile\HomeController::class, 'activar'])->name('activar');


// Profile Section
Route::prefix(env('user'))->namespace('User')->group(static function() {
    Route::middleware('auth')->group(static function () {

        /*
        |--------------------------------------------------------------------------
        | Perfil - Usuario
        |--------------------------------------------------------------------------
        */

        Route::get('/perfil', [App\Http\Controllers\Profile\HomeController::class, 'perfilUsuario'])->name('perfil');



        /*
        |--------------------------------------------------------------------------
        | Dashboard Routes
        |--------------------------------------------------------------------------
        */
        //Route::resource('home',HomeController::class);

        Route::get('/', [App\Http\Controllers\Profile\HomeController::class, 'index'])->name('dash');
        Route::get('/home', [App\Http\Controllers\Profile\HomeController::class, 'settings'])->name('home');
        Route::patch('/input_code/{id}', [App\Http\Controllers\Profile\HomeController::class, 'input_code']);
        Route::get('/home/activeEvent/{id}', [App\Http\Controllers\Profile\HomeController::class, 'activeEvent']);
        Route::get('/services', [App\Http\Controllers\Profile\HomeController::class, 'indexService'])->name('services');
        Route::get('/services/add', [App\Http\Controllers\Profile\HomeController::class, 'createService'])->name('services_create');
        Route::get('/services/edit/{id}', [App\Http\Controllers\Profile\HomeController::class, 'editService'])->name('services_create');
        Route::get('/services/delete/{id}', [App\Http\Controllers\Profile\HomeController::class, 'deleteService'])->name('services_create');

        Route::get('/notifications', [App\Http\Controllers\Profile\HomeController::class, 'notifications'])->name('notifications');


        Route::get('/settings', [App\Http\Controllers\Profile\HomeController::class, 'settings'])->name('settings');
        Route::get('/request', [App\Http\Controllers\Profile\HomeController::class, 'listRequest'])->name('request_user');
        Route::post('/request/edit/{id}', [App\Http\Controllers\Profile\HomeController::class, 'editRequest'])->name('request_edit');
        Route::post('/request/delete/{id}', [App\Http\Controllers\Profile\HomeController::class, 'deleteRequest'])->name('request_delete');
        Route::post('/services/update', [App\Http\Controllers\Profile\HomeController::class, 'updateService'])->name('services_update_post');
        Route::post('/services/add', [App\Http\Controllers\Profile\HomeController::class, 'storeService'])->name('services_create_post');
        Route::post('/request/create', [App\Http\Controllers\Profile\HomeController::class, 'storeRequest']);
        /*
        |--------------------------------------------------------------------------
        | Levels Routes
        |--------------------------------------------------------------------------
        */
        Route::get('/levels', [App\Http\Controllers\Profile\LevelsController::class, 'index'])->name('levels');
    });
});

// Control de fallos
Route::fallback(function () {
    return view('errors.404'); // template should exists
});
