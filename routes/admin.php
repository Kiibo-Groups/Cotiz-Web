<?php 

Route::get('/admin',[App\Http\Controllers\Admin\AdminController::class, 'index']);

// Admin Section
// Route::group(['namespace' => 'Admin','prefix' => env('admin')], function(){
Route::prefix(env('admin'))->namespace('Admin')->group(static function() {
    
    Route::get('login',[App\Http\Controllers\Admin\AdminController::class, 'index']);
    Route::post('login',[App\Http\Controllers\Admin\AdminController::class,'login']);

    // Route::group(['middleware' => 'admin'], function(){
    Route::middleware('admin')->group(static function () {
        /*
        |-----------------------------------------
        |Dashboard and Account Setting & Logout
        |-----------------------------------------
        */ 
         
        Route::get('dash',[App\Http\Controllers\Admin\AdminController::class, 'home']);
        Route::get('settings',[App\Http\Controllers\Admin\AdminController::class, 'settings'])->name('settings'); 
        Route::post('/settings',[App\Http\Controllers\Admin\AdminController::class, 'settings_update']);
        Route::get('/profile',[App\Http\Controllers\Admin\AdminController::class, 'profile'])->name('profile'); 
        Route::post('/profile',[App\Http\Controllers\Admin\AdminController::class, 'update']);
        Route::get('logout',[App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('logoutAdmin');

        /*
        |--------------------------------------------------------------------------
        | Banners Routes
        |--------------------------------------------------------------------------
        */
        Route::apiResource('/banners',BannersController::class);
        Route::get('/banners',  [App\Http\Controllers\Admin\BannersController::class, 'index'])->name('banners');
        Route::get('/banners/edit/{id}', [App\Http\Controllers\Admin\BannersController::class, 'edit']); 
        Route::get('/banners/delete/{id}', [App\Http\Controllers\Admin\BannersController::class, 'delete']); 
        Route::get('/banners/status/{id}', [App\Http\Controllers\Admin\BannersController::class, 'status']); 
       
        /*
        |--------------------------------------------------------------------------
        | Mentors Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('/mentors',MentorsController::class);
        Route::get('/mentors', [App\Http\Controllers\Admin\MentorsController::class, 'index'])->name('mentors'); 
        Route::get('/mentors/edit/{id}', [App\Http\Controllers\Admin\MentorsController::class, 'edit']); 
        Route::get('/mentors/status/{id}', [App\Http\Controllers\Admin\MentorsController::class, 'status']); 
        Route::get('/mentors/delete/{id}', [App\Http\Controllers\Admin\MentorsController::class, 'delete']); 

        /*
        |--------------------------------------------------------------------------
        | Users Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('/users',UsersController::class);
        Route::get('/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users'); 
        Route::get('/users/edit/{id}', [App\Http\Controllers\Admin\UsersController::class, 'edit']); 
        Route::get('/users/status/{id}', [App\Http\Controllers\Admin\UsersController::class, 'status']); 
        Route::get('/users/delete/{id}', [App\Http\Controllers\Admin\UsersController::class, 'delete']); 
    
        /*
        |--------------------------------------------------------------------------
        | Our Providers Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('/providers',ProvidersController::class);
        Route::get('/providers', [App\Http\Controllers\Admin\ProvidersController::class, 'index'])->name('providers'); 
        Route::get('/providers/edit/{id}', [App\Http\Controllers\Admin\ProvidersController::class, 'edit']); 
        Route::get('/providers/status/{id}', [App\Http\Controllers\Admin\ProvidersController::class, 'status']); 
        Route::get('/providers/delete/{id}', [App\Http\Controllers\Admin\ProvidersController::class, 'delete']); 
        Route::post('/providers/updateInfo', [App\Http\Controllers\Admin\ProvidersController::class, 'updateInfo']);

        /*
        |--------------------------------------------------------------------------
        | Our Services Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('/services',ServicesController::class);
        Route::get('/services', [App\Http\Controllers\Admin\ServicesController::class, 'index'])->name('services'); 
        Route::get('/services/edit/{id}', [App\Http\Controllers\Admin\ServicesController::class, 'edit']); 
        Route::get('/services/status/{id}', [App\Http\Controllers\Admin\ServicesController::class, 'status']); 
        Route::get('/services/delete/{id}', [App\Http\Controllers\Admin\ServicesController::class, 'delete']); 
        Route::post('/services/updateInfo', [App\Http\Controllers\Admin\ServicesController::class, 'updateInfo']);

        /*
        |--------------------------------------------------------------------------
        | Secciones / Inicial, About, Beneficts, Advisers Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('/section',SectionsController::class);
        Route::get('/seccion_initial', [App\Http\Controllers\Admin\SectionsController::class, 'index'])->name('seccion_initial'); 
        Route::get('/seccion_about', [App\Http\Controllers\Admin\SectionsController::class, 'seccion_about'])->name('seccion_about'); 
        Route::get('/seccion_beneficts', [App\Http\Controllers\Admin\SectionsController::class, 'seccion_beneficts'])->name('seccion_beneficts');
        Route::get('/seccion_advisers', [App\Http\Controllers\Admin\SectionsController::class, 'seccion_advisers'])->name('seccion_advisers'); 
        Route::get('/seccion_mentors', [App\Http\Controllers\Admin\SectionsController::class, 'seccion_mentors'])->name('seccion_mentors');
        Route::get('/seccion_schedule_meeting', [App\Http\Controllers\Admin\SectionsController::class, 'seccion_schedule_meeting'])->name('seccion_schedule_meeting');
        Route::post('/section/updateInit',[App\Http\Controllers\Admin\SectionsController::class, 'updateInit']);

        /*
        |--------------------------------------------------------------------------
        | Events Routes
        |--------------------------------------------------------------------------
        */
        Route::resource('/events',EventsController::class);
        Route::get('/events', [App\Http\Controllers\Admin\EventsController::class, 'index'])->name('events'); 
        Route::get('/events/edit/{id}', [App\Http\Controllers\Admin\EventsController::class, 'edit']); 
        Route::get('/events/status/{id}', [App\Http\Controllers\Admin\EventsController::class, 'status']); 
        Route::get('/events/delete/{id}', [App\Http\Controllers\Admin\EventsController::class, 'delete']); 
    });
});