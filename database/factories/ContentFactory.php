<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Content::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'gender' => $this->faker->numberBetween(1, 2),//1:男性 2:女性
            'email' => $this->faker->safeEmail(),
            'postcode' => $this->faker->postcode(),
            'address' => mb_substr($this->faker->address(),9),
            // 'building_name()' => $this->faker->secondaryAddress(),
            'opinion' => $this->faker->realText(100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
