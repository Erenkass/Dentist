<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tc' => rand(90,150),//90 ile 150 arasında random sayı
            'name' => $this->faker->text(6),//random name atıyor
            'surname'=>$this->faker->text(5),
          //  'user_id' => rand(1,2)
        ];
    }
}
