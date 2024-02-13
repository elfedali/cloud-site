<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Shop;
use App\Models\ShopMeta;

class ShopMetaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopMeta::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'shop_id' => Shop::factory(),
            'meta_key' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'meta_value' => $this->faker->text(),
        ];
    }
}
