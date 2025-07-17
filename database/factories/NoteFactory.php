<?php

namespace Database\Factories;

use App\Models\student;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => student::factory(),
            'note' => $this->faker->numberBetween(0,20),
            'matiere' => $this->faker->randomElement(['Math' , 'Info'])
        ];
    }
}
