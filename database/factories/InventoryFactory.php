<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        $serialNumber = 'SN' . $this->faker->unique()->numerify('##########');

        // Generate QR Code berdasarkan Serial Number atau data lain yang diinginkan
        $qrCodeData = $serialNumber;
        $qrImageName = $serialNumber . '.png';
        $qr = QrCode::format('png')->size(300)->margin(3)->generate($qrCodeData);

        // Simpan QR Code ke storage/public/qr
        $qrCodePath = 'qr/' . $qrImageName;
        Storage::disk('public')->put($qrCodePath, $qr);
        return [
            'tenant_name'=> $this->faker->name,
            'serial_number' => $serialNumber,
            'sid_sidwan'=> 'SIDS' . $this->faker->unique()->numerify('##########'),
            'sid_connectivity'=> 'SIDC' . $this->faker->unique()->numerify('##########'),
            'customer_name'=> 'CUS' . $this->faker->name,
            'hostname_edge'=> 'HE' . $this->faker->unique()->numerify('##########'),
            'edge_type'=> $this->faker->randomElement(['Type A', 'Type B', 'Type C', 'Type D', 'Type E']),
            'qr_code' => $qrCodePath, // Simpan path QR Code ke database
        ];
    }
}
