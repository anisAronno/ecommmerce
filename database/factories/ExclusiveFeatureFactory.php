<?php

namespace Database\Factories;

use App\Models\ExclusiveFeature;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExclusiveFeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExclusiveFeature::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->company,
            'description' => $this->faker->text(50),
        ];
    }
}
