<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),// titre de la photo
            'description' => $this->faker->sentence(),// description de la photo
            'file' => $this->faker->word() . ".png",// Chemin du fichier de la photo
            'date' => null, // date de la photo nullable
            'width' => rand(0,5000),// Largeur de la photo
            'height' => rand(0,5000),// hauteur de la photo
            'resolution' => null,// resolution de la photo nullable
            'user_id' => User::factory(),// id user
            'group_id' => Group::factory(),// id group
            'created_at' => null,
            'updated_at' => null,
        ];
    }
}
