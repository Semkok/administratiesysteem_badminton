<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nickname' => $this->faker->firstName,
            'name' => $this->faker->name,
            'surname' => $this->faker->lastName,
            'phonenumber' => $this->faker->phoneNumber,
            'email' => $this->faker->email(),
            'photograph' => $this->faker->imageUrl(),
            'address' => $this->faker->address,
            'bank' => $this->faker->country,
            'payment_method' => $this->faker->userName,
            'birthday' => $this->faker->dateTimeBetween("2003-01-01","2013-01-01"),
            'registration_date' => $this->faker->dateTimeBetween("2015-01-01",Carbon::now()),
            'expiration_date' => $this->faker->dateTimeBetween(Carbon::now(),"2030-01-01"),
//            'tournament_id' => 1
        ];
    }
}
