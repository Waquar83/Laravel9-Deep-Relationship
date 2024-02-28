<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Geo\FrCitiesProvider;
use Faker\Provider\Geo\UsCitiesProvider;
use Faker\Provider\Geo\EsCitiesProvider;
use Faker\Provider\Geo\CoCitiesProvider;
use Faker\Provider\Geo\MxCitiesProvider;
use Faker\Provider\Geo\BeCitiesProvider;
use Faker\Provider\Geo\GbCitiesProvider;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            "name" => $this->faker->city(),
        ];
    }
}
