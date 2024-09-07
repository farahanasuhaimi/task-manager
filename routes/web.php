<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Basis routes
Route::get('/about', [Controller::class, "about"]);

// UserController routes
Route::get('/', [UserController::class, "homepage"]);
Route::post('/register', [UserController::class, "register"])->middleware('guest');
Route::post('/login', [UserController::class, "login"])->name('login');
Route::post('/logout', [UserController::class, "logout"])->middleware('auth');

// ProjectController routes
Route::get('/projects/create-project', [ProjectController::class, "showCreateProjectForm"]);
Route::post('/projects/create-project', [ProjectController::class, "createProject"]);

Route::group(['middleware' => ['auth']], function () {

    /*     // LIST KAN SENARAI MANUSCRIPT ##########
        Route::get('senarai_manuscript', 'App\Http\Controllers\manuscriptModule\manuscriptController@index')->name('senarai_manuscript');
        Route::get('senarai_manuscript/getlist', 'App\Http\Controllers\manuscriptModule\manuscriptController@getlist')->name('senarai_penuh_manuscript');
    
    // VIEW MANUSCRIPT ########
        Route::get('view_manuscript/{id}', [
            'as' => 'view_manuscript',
            'uses' => 'App\Http\Controllers\manuscriptModule\manuscriptController@show'
        ]);
    
    // TAMBAH MANUSCRIPT BARU #########
        Route::get('tambah_manuscript_baru', 'App\Http\Controllers\manuscriptModule\manuscriptController@create')->name('tambah_manuscript_baru');
        Route::post('simpan_manuscript_baru', 'App\Http\Controllers\manuscriptModule\manuscriptController@store')->name('simpan_manuscript_baru');
    
    // EDIT MANUSCRIPT #########
        Route::get('edit_manuscript/{id}', [
            'as' => 'edit_manuscript',
            'uses' => 'App\Http\Controllers\manuscriptModule\manuscriptController@edit'
        ]);
        Route::post('edit_manuscript/{id}', [
            'as' => 'update_manuscript',
            'uses' =>'App\Http\Controllers\manuscriptModule\manuscriptController@update'
        ]);
    
    // END ROUTE */
});
