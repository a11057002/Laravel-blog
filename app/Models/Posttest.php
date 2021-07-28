<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    // use HasFactory;
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function find($slug)
    {
        // if (!file_exists($path = resource_path("posts/{$slug}.html"))){
        //     throw new ModelNotFoundException;
        // }
        // return cache()->remember("posts.{$slug}",100,fn()=>file_get_contents($path));
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts")))
                ->map(function ($file) {
                    return YamlFrontMatter::parseFile($file);
                })
                ->map(function ($document) {
                    return new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug);
                })
                ->sortByDesc('date');
        });
        // $files = File::files(resource_path("posts"));
        // return array_map(fn ($file)=>$file->getContents(),$files);
    }
}
