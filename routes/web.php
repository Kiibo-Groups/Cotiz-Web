<?php

include("admin.php");

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
// Register Section
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register_get');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register_post');
// Index Section
/* Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'home'])->name('home');
 */
Route::get('/', function () {
    return redirect('/home');
});

// Events Section
Route::get('/event', [App\Http\Controllers\EventsController::class, 'index'])->middleware('auth')->name('event');
Route::get('/event/{id}', [App\Http\Controllers\EventsController::class, 'uniqueEvt'])->middleware('auth')->name('event');
Route::post('/event/comment/{id}', [App\Http\Controllers\EventsController::class, 'comment'])->middleware('auth');

// Contact Section
Route::get('/contact', [App\Http\Controllers\Controller::class, 'contact'])->name('contact');
Route::post('/contact', [App\Http\Controllers\Controller::class, '_contact']);


// Contact Section
Route::get('/call_advice', [App\Http\Controllers\Controller::class, 'call_advice'])->name('call_advice');
Route::post('/call_advice', [App\Http\Controllers\Controller::class, '_call_advice']);


// Profile Section
Route::prefix(env('user'))->namespace('User')->group(static function() {
    Route::middleware('auth')->group(static function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('home',HomeController::class);
        Route::get('/home', [App\Http\Controllers\Profile\HomeController::class, 'index'])->name('home');
        Route::patch('/input_code/{id}', [App\Http\Controllers\Profile\HomeController::class, 'input_code']);
        Route::get('/home/activeEvent/{id}', [App\Http\Controllers\Profile\HomeController::class, 'activeEvent']);
        Route::get('/services', [App\Http\Controllers\Profile\HomeController::class, 'index'])->name('services');
        Route::get('/services/add', [App\Http\Controllers\Profile\HomeController::class, 'createService'])->name('services_create');
        Route::get('/services/edit/{id}', [App\Http\Controllers\Profile\HomeController::class, 'editService'])->name('services_create');
        Route::get('/services/delete/{id}', [App\Http\Controllers\Profile\HomeController::class, 'deleteService'])->name('services_create');

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
