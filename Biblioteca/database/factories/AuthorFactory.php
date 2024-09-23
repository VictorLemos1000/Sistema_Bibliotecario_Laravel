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
    protected $model = AuthorFactory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'birth_date' => $this->faker->date()
        ];
    }
}
