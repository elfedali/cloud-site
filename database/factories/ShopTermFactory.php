<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Shop;
use App\Models\ShopTerm;
use App\Models\Term;

class ShopTermFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopTerm::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'shop_id' => Shop::factory(),
            'term_id' => Term::factory(),
            'weight' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
