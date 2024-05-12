<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SertificateDiscriptions;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sertificate>
 */
class SertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->firstName() . ' ' . fake()->lastName(),
            'uuid' => fake()->uuid(),
            'sertificate_discription_id' => SertificateDiscriptions::all()->random()->id
        ];
    }
}
