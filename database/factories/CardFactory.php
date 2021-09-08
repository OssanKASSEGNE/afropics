<?php

namespace Database\Factories;

use App\Models\Card;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "card_number" => $this->faker->creditCardNumber(),
            "card_type" => $this->faker->creditCardType(),
            "card_expiration_date" => $this->faker->creditCardExpirationDate,
    
        ];
    }
}
