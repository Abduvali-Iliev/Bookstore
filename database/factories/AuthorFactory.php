<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'image' => $this->getImage(rand(1, 4)),
            'description' => $this->faker->paragraph(),
        ];
    }

    public function getImage(int $image_number = 1)
    {
        $path = storage_path() . "/seed_pictures/authors/" . $image_number . ".jpeg";
        $image_name = md5($path) . ".jpeg";
        $resize = Image::make($path)->encode("jpeg");
        Storage::disk('public')->put('pictures/authors/' . $image_name, $resize->__toString());
        return 'pictures/authors/' . $image_name;
    }
}
