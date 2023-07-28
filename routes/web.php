<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Models\Project;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('/projects' , ['projects' => Project::where('user_id' , auth()->user()->id )->orderBy('dead_line' , 'desc')->get()]);
    })->name('dashboard');
});

Route::resource('/projects' ,ProjectController::class )->middleware('auth');
Route::resource('/projects/tasks', TaskController::class )->middleware('auth');