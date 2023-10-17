<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DemandeLogementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        //
        $ville = $this->faker->city;
        $pays = $this->faker->country;

        return [
            "nom" => $this->faker->lastName,
            "prenom" => $this->faker->firstName,
            "sexe" => array_rand(["M", "F"], 1),
            "dateNaissance" => $this->faker->dateTimeBetween("2022-18-09", "2023-18-09"),
            "lieuNaissance" => "$pays, $ville",
            "nationalite" => $this->faker->country,
            "pays" => $pays,
            "ville" => $ville,
            "adresse" => $this->faker->address,
            "telephone" => $this->faker->phoneNumber,
            "pieceIdentite" => array_rand(["CNI", "PASSPORT", "PERMIS DE CONDUIRE"], 1),
            'email' => $this->faker->unique()->safeEmail(),
            'positionDeVie' => array_rand(["MARIE", "CELIBATAIRE"], 1),
            'choixDeLogement' => $this->faker->randomElement(['Appartement', 'Maison', 'Studio', 'Chalet', 'Maison Simple', 'Chambre Simple', 'Chambre Salle de bain']),
            'message' => $this->faker->sentence,

        ];
    }
}
