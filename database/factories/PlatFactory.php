<?php

namespace Database\Factories;

use App\Models\Plat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plat>
 */
class PlatFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
    
     *
     * @return array<string, mixed>
     */
    protected $model = Plat::class;
    public function definition()
    {
        return [
            //
            'Nom' => $this->faker->word,
            'created_at' => now()

        ];
    }
}
