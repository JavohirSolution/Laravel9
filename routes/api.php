<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\APIcontroller as ControllersAPIcontroller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('posts', [ControllersAPIcontroller::class, 'index']);
// Route::get('posts/{post}', [ControllersAPIcontroller::class, 'show']);

Route::apiResource('posts', ControllersAPIcontroller::class);
