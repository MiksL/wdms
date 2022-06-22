<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Warehouse_Stock;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Warehouse_StockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Warehouse_Stock::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'warehouse_id' => $this->faker->numberBetween(1, 20),
            'product_id' => $this->faker->numberBetween(1, 50),
            'product_count' => $this->faker->numberBetween(1, 90000),
        ];
    }
}
