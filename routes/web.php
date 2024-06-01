<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\SliderController;

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

Route::get('/', [IndexController::class, 'index'])
    ->name('home');
Route::get('/hello', [IndexController::class, 'show']);
Route::get('/about', [IndexController::class, 'about'])
    ->name('about');
Route::get('/blog', [IndexController::class, 'blog'])
    ->name('blog');
Route::get('/resources', [IndexController::class, 'resources'])
    ->name('resources');


Route::resource('groups', GroupController::class)
    ->middleware('auth');
    // ->only(['create', 'store', 'destroy']);


// Route::resource('groups', GroupController::class);
        // ->except(['create', 'store', 'destroy']);

Route::resource('groups.todos', TodoController::class)
    ->scoped(['todos' => 'group']);
    // ->only(['create', 'store', 'show']);


Route::resource('todos', TodoController::class);
    // ->only('index', 'show'); //šo vajag, bet jāsakārto del un edit linki web lapās

Route::put('/todo/complete/{todo}', [TodoController::class, "complete"])
    ->name('todo.complete');

Route::get('alltodos/alltogether', [TodoController::class, 'alltogether'])
    ->name('showalltodos');


Route::get('login', [AuthController::class, 'create'])
    ->name('login');

Route::post('login', [AuthController::class, 'store'])
    ->name('login.store');

Route::delete('logout', [AuthController::class, 'destroy'])
    ->name('logout');

Route::resource('user-account', UserAccountController::class)
    ->only(['create', 'store']);

Route::get('slider', [SliderController::class, 'index'])
    ->name('slider');

// Route::prefix('group')
//   ->name('group.')
// //   ->middleware('auth')
//   ->group(function () {
//     Route::resource('todo', GroupTodoController::class);
//   });



// Route::resource('group', GroupController::class);

Route::fallback(function(){
    return "Page does not exist";

});
