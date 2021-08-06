<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class PostService
{

    public function getPosts()
    {
        return Post::with(['category', 'user'])->latest()->andyFilter(request(['search', 'category', 'user']))->paginate(5)->withQueryString();
    }

    public function getCategory()
    {
        return request('category') ? Category::firstWhere('name', request('category'))->name : 'Category';
    }

    public function createPost()
    {
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => 'image',
            'slug' => 'required|unique:posts,slug',
            'category' => 'required|exists:categories,id'
        ]);
        $attr = request()->except('category');
        $attr['category_id'] = request()->get('category');
        $attr['user_id'] = auth()->id();
        $attr['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Post::create($attr);
    }

    public function updatePost(Post $post)
    {
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'thumbnail' => 'image',
            // 排除掉自己 id 的 unique slug
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'body' => 'required',
            'category' => 'required',
            'hyperlink' => 'url'
        ]);
        $attr = request()->except(['category', 'body']);
        $attr['body'] = str_replace("\r\n", "<br>", request()->get('body'));
        $attr['category_id'] = request()->get('category');
        if (request()->file('thumbnail'))
            $attr['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $post->update($attr);
    }

    public  function parseYoutube($link)
    {
        if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $link, $id)) {
            $link = $id[1];
        } else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $link, $id)) {
            $link = $id[1];
        } else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $link, $id)) {
            $link = $id[1];
        } else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $link, $id)) {
            $link = $id[1];
        } else if (preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/]+)/', $link, $id)) {
            $link = $id[1];
        } else {
            // not an youtube video
        }
        return $link;
    }
}
