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
    {
        return [
            'owner_id' => User::factory(),
            'title' => $this->faker->sentence(4),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'excerpt' => $this->faker->text(),
            'status' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'type' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'comment_status' => $this->faker->word(),
            'ping_status' => $this->faker->regexify('[A-Za-z0-9]{10}'),
        ];
    }
}
