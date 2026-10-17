<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\ParkingSlot;
use Illuminate\Database\Seeder;

class ParkingSlotSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Area::all() as $area) {
            for ($i = 1; $i <= 3; $i++) {
                ParkingSlot::create([
                    'area_id' => $area->id,
                    'kode_slot' => $area->nama_area . '-' . $i,
                    'status' => fake()->randomElement([
                        'tersedia',
                        'terisi',
                    ]),
                ]);
            }
        }
    }
}