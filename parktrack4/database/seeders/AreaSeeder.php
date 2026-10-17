<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (['Zona A', 'Zona B', 'Zona C', 'Zona D', 'Zona E'] as $nama) {
            Area::create([
                'nama_area' => $nama,
                'lokasi' => $faker->address(),
                'kapasitas' => $faker->numberBetween(10, 50),
            ]);
        }
    }
}