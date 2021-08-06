<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\PostService;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getPosts();
        $currentCategory = $this->postService->getCategory();
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories', 'currentCategory'));
    }

    public function show(Post $post)
    {
        //目前只處理 youtube 影片
        $post->hyperlink = $this->postService->parseYoutube($post->hyperlink);
        // 執行 safe 才會存到 db 中
        // $post->save();
        return view('posts.show', compact('post'));
        // $test = cache()->remember("post.{$test}" , 5 , fn() => $test);
        // return view('test',compact('test'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->postService->createPost();
        return redirect('/post/' . request()->get('slug'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        // 換行轉換
        $post->body = str_replace("<br>", "\r\n", $post->body);
        $this->postService->updatePost($post);
        return redirect('/post/' . request()->get('slug'));
    }

    public function destory(Post $post)
    {
        Storage::delete($post->thumbnail);
        $post->delete();
        return redirect('/');
    }

    public function showUser(User $user) //show all specific user posts
    {
        $posts = $user->posts()->paginate(5);
        $currentCategory = null;
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories', 'currentCategory'));
    }
}
