<?php

namespace Database\Factories;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscription::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date1 = $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = 'Europe/Paris');
        $date2 = $this->faker->dateTimeBetween($startDate = '-3 months', $endDate = '3 years', $timezone = 'Europe/Paris');
        
        return [
            "subscription_date_start" => ($date1 < $date2)? $date1 : $date2,
            "subscription_date_end" => ($date1 < $date2)? $date2 : $date1,
            "remaining_credit" => rand(0,2000)
        ];
    }
}
