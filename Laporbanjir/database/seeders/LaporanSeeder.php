<?php

namespace Database\Seeders;

use App\Models\Laporan;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $lokasi = [
            'Dayeuhkolot',
            'Baleendah',
            'Bojongsoang',
            'Rancaekek',
            'Majalaya',
        ];

        for ($i = 0; $i < 15; $i++) {
            Laporan::create([
                'nama_pelapor' => $faker->name(),
                'lokasi' => $faker->randomElement($lokasi),
                'tinggi_genangan' => $faker->numberBetween(10, 150),
                'tanggal_kejadian' => $faker
                    ->dateTimeBetween('-1 month', 'now')
                    ->format('Y-m-d'),
            ]);
        }
    }
}