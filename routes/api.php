<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

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

Route::get('posts', function () {
    // $posts = Cache::forget('posts');
    // Cache::flush('posts');
    $posts = Post::all();
    $allPost = "";
    foreach ($posts as $post) {
        $allPost .= $post->title;
    }
    Cache::put('title',$allPost);
    // $posts = Cache::remember('posts', now()->addSeconds(30), function () {
    //     return Post::latest()->get();
    // });
    return Cache::get('title');
});
