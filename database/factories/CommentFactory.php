<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory //Factorie 
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),//id user
            'photo_id' => Photo::factory(),//id photo
            'text' => $this->faker->text,//text du comment de la photo
            'comment_id' => null,//id du comment
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
