<?php declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ErrorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'file_name' => $this->faker->word,
            'entry_number_in_file' => $this->faker->numberBetween(1, 100),
            'errors' => [
                $this->faker->sentence,
                $this->faker->sentence,
            ],
            'operation_id' => $this->faker->uuid,
            'store_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
