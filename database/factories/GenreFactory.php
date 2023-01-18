<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private array $genres_array = [];

    public function definition()
    {
        return [
            'name' => $this->genres(),
            'image' => $this->getImage(rand(1, 4)),
            'description' => $this->faker->paragraph(),
        ];
    }

    public function genres()
    {
        $genres = ['romance', 'detective', 'fantasy', 'western', 'horror', 'drama', 'war', 'family', 'crime'];
        while (true) {
            $rand_genre = rand(0, count($genres) - 1);
            if (!in_array($rand_genre, $this->genres_array)) {
                $this->genres_array[] = $rand_genre;
                return $genres[$rand_genre];
            }
        }
    }

    public function getImage(int $image_number = 1)
    {
        $path = storage_path() . "/seed_pictures/genres/" . $image_number . ".jpeg";
        $image_name = md5($path) . ".jpeg";
        $resize = Image::make($path)->encode("jpeg");
        Storage::disk('public')->put('pictures/genres/' . $image_name, $resize->__toString());
        return 'pictures/genres/' . $image_name;
    }
}
