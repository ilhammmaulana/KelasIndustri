<?php

namespace Database\Factories;

use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $date = (new DateTime())->setTimezone(new DateTimeZone('Asia/Jakarta'));
        return [
            "title" => fake()->paragraph(1),
            "description" => fake()->paragraph(5),
            "created_by" => rand(1, 10),
            "done" => false,
            'created_at' => $date,
            'updated_at' => $date

        ];
    }
}
