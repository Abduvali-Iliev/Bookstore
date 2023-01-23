<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
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
            'image' => $this->getImage(rand(1, 6)),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(100, 1100),
            'author_id' => rand(1, 4),
            'genre_id' => rand(1, 4),
        ];
    }

    public function getImage(int $image_number = 1)
    {
        $path = storage_path() . "/seed_pictures/books/" . $image_number . ".jpeg";
        $image_name = md5($path) . ".jpeg";
        $resize = Image::make($path)->encode("jpeg");
        Storage::disk('public')->put('pictures/books/' . $image_name, $resize->__toString());
        return 'pictures/books/' . $image_name;
    }

}
