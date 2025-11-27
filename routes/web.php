<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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
    Route::get('/projects/create-project', [ProjectController::class, "showCreateProjectForm"])->name('projects.create.form');
    Route::post('/projects/create-project', [ProjectController::class, "createProject"])->name('projects.create');
    Route::get('/projects/list-projects', [ProjectController::class, "listProjects"])->name('projects.list');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    // Task Routes
    Route::prefix('projects/{project}/tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
        Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
        Route::put('/{task}', [TaskController::class, 'update'])->name('tasks.update');
        Route::patch('/{task}/archive', [TaskController::class, 'archive'])->name('tasks.archive');
        Route::delete('/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    });
});
