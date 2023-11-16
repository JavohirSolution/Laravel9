<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'welcome'])->name('main');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/service', [UserController::class, 'service'])->name('service');
Route::get('/project', [UserController::class, 'project'])->name('project');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_store'])->name('register.store');

Route::get('notification/{notitfication}/read', [NotificationController::class, 'read'])->name('notification.read');

Route::get('/language/{locale}',[LanguageController::class, 'change'])->name('locale.change');

Route::resources([
    'posts' => PostController::class,
    'comments' => CommentController::class,
    'notification' => NotificationController::class
]);
