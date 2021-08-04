<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title'=>$this->faker->sentence(),
            'excerpt' => $this->faker->sentence(),
            // 'excerpt' => '<p>' . implode('</p></p>',$this->faker->paragraphs(2)) . '</p>',
            // 'body' => str_replace("<br>","\r\n",$this->faker->paragraphs(10,true)),
            'body' => '<p>' . implode('</p></p>',$this->faker->paragraphs(10)) . '</p>',
            'slug' => $this->faker->slug(),
            'user_id' => User::Factory(),
            'category_id' => Category::Factory(),
        ];
    }
}
