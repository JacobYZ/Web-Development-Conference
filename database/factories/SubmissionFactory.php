<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'author_id' => \App\Models\User::factory(),
            'title' => $this->faker->sentence,
            'abstract' => $this->faker->paragraph,
            'score' => $this->faker->randomFloat(1, 0, 5),
        ];
    }
}
