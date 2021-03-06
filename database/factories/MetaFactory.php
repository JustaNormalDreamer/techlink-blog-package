<?php

namespace Techlink\Blog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Techlink\Blog\Models\Meta;

class MetaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var stringA
     */
    protected $model = Meta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph($nbSentences = 30, $variableNbSentences = true),
            'keywords' => $this->faker->sentence,
        ];
    }
}
