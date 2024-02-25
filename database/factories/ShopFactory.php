<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Shop;
use App\Models\User;

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    { // get random user
        $user =  User::inRandomOrder()->first();
        return [
            'owner_id' => $user->id,
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text(),
            'excerpt' => $this->faker->text(),
            'status' => $this->faker->randomElement(['draft', 'published']),
            'type' => Shop::TYPE_RESTAURANT,
            'comment_status' => $this->faker->randomElement(['open', 'closed']),
            'ping_status' => $this->faker->randomElement(['open', 'closed']),
        ];
    }
}
