<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenant_name'=> $this->faker->name,
            'serial_number' => 'SN' . $this->faker->unique()->numerify('##########'),
            'sid_sidwan'=> 'SIDS' . $this->faker->unique()->numerify('##########'),
            'sid_connectivity'=> 'SIDC' . $this->faker->unique()->numerify('##########'),
            'customer_name'=> 'CUS' . $this->faker->name,
            'hostname_edge'=> 'HE' . $this->faker->unique()->numerify('##########'),
            'edge_type'=> $this->faker->randomElement(['Type A', 'Type B', 'Type C', 'Type D', 'Type E']),
        ];
    }
}
