<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\StorePostRequest;
use App\Jobs\BigUploadFile;
use App\Jobs\ChangePost;
use App\Mail\PostCreateds;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\PostCreated as NotificationsPostCreated;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = Post::all()->filter(function ($post) {
        //     return $post->id > 60;
        // });

        // $text = "";
        // foreach($users as $post){
        //     $text .= $post->id;
        // }
        // return $users;
        $posts = Post::latest()->paginate(15);

        return view('posts.index')->with('posts', $posts);


        // Post::create([
        //     'title' => "javohir",
        //     'short_content' => "2",
        //     'content' => '3',
        //     'photo' =>"4"
        // ]);

        // $post = Post::where('title',1)->max('id');
        // $post = Post::find(1);
        // $post->title = "Javohir";
        // dd($post->getOriginal('title'));
        // Post::truncate();
        // $post = Post::destroy(7);
        // $post = DB::table('posts')->latest()->get();
        // dd($post);
        // return 'suucess';
        // dd($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with([
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // dd($request);
        if ($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photo', $name);
        }
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            // 'photo' => $path ?? "post-photo/avatar.png",
            'photo' => $path ?? null,
        ]);

        if (isset($request->tags)) {
            foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
            }
        }
        PostCreated::dispatch($post);

        ChangePost::dispatch($post);

        Mail::to($request->user())->queue((new PostCreateds($post))->onQueue('mailing')->delay(now()->addSeconds(30)));

        Notification::send(auth()->user(), new NotificationsPostCreated($post));

        return redirect()->route('posts.index')->with('success', 'Post muvaffaqiyatli yaratildi');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'recent_post' => Post::latest()->get()->take(5),
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Post $post, User $user)
    {
        if ($user->id === $post->user_id) {
            Gate::authorize('update', $post);
        } else {
            !Gate::authorize('update', $post);
        }

        // dd($post);

        return view('posts.edit')->with(['posts' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        // Gate::authorize('update-post', $post);

        if ($request->hasFile('photo')) {
            if (isset($post->photo)) {
                Storage::delete($post->photo);
            }

            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photo', $name);
        }
        $post->update([
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'photo' => $path ?? $post->photo,
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, User $user)
    {
        if ($user->id === $post->user_id) {
            Gate::authorize('update', $post);
        } else {
            !Gate::authorize('update', $post);
        }

        if (isset($post->photo)) {
            Storage::delete($post->photo);
        }
        $post->delete();

        return redirect()->route('posts.index');
    }
}
