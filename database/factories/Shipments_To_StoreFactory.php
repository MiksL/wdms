<?php

namespace Database\Factories;

use App\Models\Shipments_To_Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Shipments_To_StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shipments_To_Store::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'warehouse_id' => $this->faker->numberBetween(1, 20),
            'store_id' => $this->faker->numberBetween(1, 50),
            'shipped_product_id' => $this->faker->numberBetween(1, 100),
            'shipped_product_count' => $this->faker->numberBetween(1, 500),
        ];
    }
}
