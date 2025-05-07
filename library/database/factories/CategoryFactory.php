<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $name = $this->faker->unique()->randomElement([
                'Fiksi',
                'Non-Fiksi',
                'Ilmu Pengetahuan',
                'Teknologi',
                'Biografi',
                'Anak-anak',
                'Fantasi',
                'Pengembangan Diri',
                'Misteri',
                'Sejarah'
            ]),
            'slug' => str()->lower(str()->slug($name) . str()->random(5)),
        ];
    }
}
