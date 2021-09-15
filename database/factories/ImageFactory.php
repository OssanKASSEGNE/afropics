<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['published', 'analyzing'];
        $filepath = $this->faker->image(storage_path("app/public/imagesFull", 1280, 650));
        return [
            "artiste_id" => User::all()->random(),
            "image_name" => basename($filepath),
            "image_path_full" => $filepath,
            "image_path_snippet" => $this->faker->image(resource_path("assets/imagesSnippet", 720, 400)),
            "image_status" => $status[random_int(0, 1)],
            "image_price" => random_int(1, 15),
            "image_description" => $this->faker->sentence(),
        ];
    }
}
