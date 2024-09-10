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
Route::get('/', [UserController::class, "homepage"])->name('login');
Route::post('/register', [UserController::class, "register"])->middleware('guest');
Route::post('/login', [UserController::class, "login"])->middleware('guest');

Route::group(['middleware' => ['auth']], function () {

    Route::post('/logout', [UserController::class, "logout"]);

    // ProjectController routes
    Route::get('/projects/create-project', [ProjectController::class, "showCreateProjectForm"]);
    Route::post('/projects/create-project', [ProjectController::class, "createProject"]);
    Route::get('/projects/list-projects', [ProjectController::class, "listProjects"])->name('projects.list');
});

