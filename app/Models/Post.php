<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['category', 'user'];




    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeandyFilter($query, array $filters)  // Post::newQuery()->filter()  <--- name after scope
    {
        // if ($filters['search']?? false){
        //    $query->where('title','like','%' . $filters['search'] . '%')
        //          ->orWhere('body','like','%' . $filters['search'] . '%');
        // }
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(fn ($query) =>
            $query->where('title', 'like', '%' .  $search . '%')
                ->orWhere('body', 'like', '%' .  $search . '%'));
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            });
            // $query->whereExists(
            //     fn ($query) =>
            //     $query->from('categories')->where('categories.name', $category)->whereColumn('categories.id','posts.category_id')
            // );
        });
        $query->when($filters['user'] ?? false, function ($query, $category) {
            $query->whereHas('user', function ($query) use ($category) {
                $query->where('name', $category);
            });
        });
    }

    public function category() // auto detect category_id if no foreign key in  mentioned
    {

        return $this->BelongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
