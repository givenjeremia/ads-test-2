<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // kendaraan
        $kendaraans = [
            [
                'nama' => 'Pajero Sport',
                'komsumsi' => '11 Km/Liter',
                'jadwal_service' => '2023-04-26'
            ],
            [
                'nama' => 'Fortuner GX',
                'komsumsi' => '10 Km/Liter',
                'jadwal_service' => '2023-08-26'
            ],
            [
                'nama' => 'Innova',
                'komsumsi' => '25 Km/Liter',
                'jadwal_service' => '2023-09-18'
            ],
            [
                'nama' => 'Avanza',
                'komsumsi' => '30 Km/Liter',
                'jadwal_service' => '2023-05-19'
            ],
            [
                'nama' => 'Xenia',
                'komsumsi' => '50 Km/Liter',
                'jadwal_service' => '2023-04-26'
            ],
            [
                'nama' => 'Pajero Sport',
                'komsumsi' => '35 Km/Liter',
                'jadwal_service' => '2023-06-21'
            ],

        ];
        DB::table('kendaraan')->insert($kendaraans);

        // Add Riwayat Kendaraan
        $riwayat_kendaraans = [
            [
                'waktu' => '2023-04-12 10:35:59',
                'keterangan' => 'Disewa untuk membeli bahan baku',
                'kendaraan_id' => 1
            ],
            [
                'waktu' => '2023-02-12 10:35:59',
                'keterangan' => 'Mengantar Client Pulang',
                'kendaraan_id' => 1
            ],
            [
                'waktu' => '2023-04-15 10:35:59',
                'keterangan' => 'Membeli Peralatan Kantor',
                'kendaraan_id' => 2
            ],
            [
                'waktu' => '2023-05-01 10:35:59',
                'keterangan' => 'Disewa untuk membeli bahan baku',
                'kendaraan_id' => 4
            ],
            [
                'waktu' => '2023-03-30 10:35:59',
                'keterangan' => 'Pertemuan Client Di Pelabuhan',
                'kendaraan_id' => 5
            ],

        ];
        DB::table('riwayat_kendaraan')->insert($riwayat_kendaraans);
    }
}
