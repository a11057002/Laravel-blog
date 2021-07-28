<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class PostService
{

    public function getPosts()
    {
        // $posts = collect($files)->map(function ($file) {
        //     $document = YamlFrontMatter::parseFile($file);
        //     return new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug);
        // });
        // $posts = []
        // foreach ($files as $file) {
        //     $document = YamlFrontMatter::parseFile($file);
        //     $posts[] = new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug);
        // }
        // dd($posts);
        // YamlFrontMatter::parseFile(resource_path('posts/test.html'));
        // DB::listen(function($q){
        //     logger($q->sql,$q->bindings);
        // });
        // $posts = Post::with('category')->get();
        return Post::with(['category','user'])->latest()->andyFilter(request(['search', 'category', 'user']))->paginate(5)->withQueryString();
    }

    public function getCategory()
    {
        return request('category') ? Category::firstWhere('name', request('category'))->name : 'Category';
    }

    public function showUser(User $user)
    {
        $posts = $user->posts()->paginate(5);
        $currentCategory = null;
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories', 'currentCategory'));
    }
}