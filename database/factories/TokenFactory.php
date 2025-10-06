<?php

namespace Database\Factories;

use App\Models\Token;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Token>
 */
class TokenFactory extends Factory
{
    protected $model = Token::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->words(2, true),
            'ips' => $this->faker->ipv4() . ', ' . $this->faker->ipv4(),
            'token' => Str::random(32),
            'activated_at' => $this->faker->optional()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}


