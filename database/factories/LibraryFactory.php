<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Library>
 */
class LibraryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        $available = $this -> faker -> randomElement(['Issued', 'Available', 'Lost']);

        return [
            'author_id' => Author::factory(),
            'name' => $this -> faker -> realText($maxNbChars = 50),
            'year' => $this -> faker -> year($max = 'now'),
            'price' => $this -> faker -> randomFloat($nbMaxDecimals = 2, $min = 5, $max = 100),
            'ISBN' => $this -> faker -> isbn13,
            'Availability' => $available,
            'created_at' => $this -> faker -> dateTime($max = 'now', $timezone = null),
        ];
    }
}
