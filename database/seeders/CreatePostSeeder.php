<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Post;
use \App\Models\User;
use \App\Models\Category;

class CreatePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // Post::truncate();
        // Category::truncate();
        // factory(number)    number to create fake data
        // $u = User::factory()->create([
        //     'name' => 'bobo'
        // ]);
        // // $u = User::find(1);
        // Post::factory(10)->create([
        //     'user_id' => $u->id
        // ]);
        // User::factory()->create();

        $c = Category::create([
            'name' => 'a',
            'slug' => 'a'
        ]);
        // $b = Category::create([
        //     'name' => 'work',
        //     'slug' => 'work'
        // ]);

        // Post::create([
        //     'title' => 'My First Post',
        //     'excerpt' => 'intro',
        //     'body' => 'fnsdjklfbkjnjklgjkdfgbjkadfgjkdfsbk',
        //     'slug' => 'andy',
        //     'user_id' => $u->id,
        //     'category_id' => $c->id
        // ]);

        // Post::create([
        //     'title' => 'My First Post',
        //     'excerpt' => 'intro',
        //     'body' => 'fnsdjklfbkjnjklgjkdfgbjkadfgjkdfsbk',
        //     'slug' => 'andy112',
        //     'user_id' => $u->id,
        //     'category_id' => $b->id
        // ]);
    }
}
