<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService){
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
        
        request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required',
            'thumbnail'=>'image',
            'slug'=>'required|unique:posts,slug',
            'category'=>'required|exists:categories,id'
        ]);
        $attr = request()->except('category');
        $attr['category_id'] = request()->get('category');
        $attr['user_id'] = auth()->id();
        $attr['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Post::create($attr);
        return redirect('/post/'. $attr['slug']);
    }

    public function showUser(User $user)
    {
        $posts = $user->posts()->paginate(5);
        $currentCategory = null;
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories', 'currentCategory'));
    }

}
