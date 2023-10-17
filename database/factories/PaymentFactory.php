<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //wes
            "nom" => $this->faker->lastName,
            "prenom" => $this->faker->firstName,
            "telephone" => $this->faker->phoneNumber,
            "montantPaye" => $this->faker->randomNumber(),
            "datePaiement" => $this->faker->dateTime(),
        ];
    }
}
