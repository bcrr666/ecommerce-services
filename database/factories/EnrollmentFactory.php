<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 2),
            'course_id' => $this->faker->numberBetween(1, 2),
            'finished_lessons' => $this->faker->numberBetween(0,3),
            'cuount_lessons' => $this->faker->numberBetween(5)
        ];
    }
}
