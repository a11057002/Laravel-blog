<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $u =  User::factory()->create(['email' => 'a@b.c', 'password' => 'andy1234']);
        $c = Category::create([
            'name' => '工作',
            'slug' => '工作'
        ]);
        Post::factory(10)->create([
            'user_id' => $u->id,
            'category_id' => $c->id
        ]);
    }
}
