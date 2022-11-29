<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $hasComplete = $this ->faker->boolean();
        if ($hasComplete){
            $email = $this -> faker->email();
            $phone = $this -> faker->numberBetween($min = 00000000000, $max = 99999999999);
        } else {
            $email = $phone = NULL;
        }

        return [
            'authorName' => $this->faker->name(),
            'email' => $email,
            'phoneNo' => $phone,
            'haveComplete' => $hasComplete,
            'created_at' => $this -> faker -> dateTime($max = 'now', $timezone = null),
        ];
    }
}
