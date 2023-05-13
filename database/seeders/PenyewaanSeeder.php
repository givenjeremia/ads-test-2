<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyewaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Add Driver
        $drivers = [
            [
                'nama' => 'Supardi',
                'keterangan' => 'No Telp: 0973123123',
                'status' => 1
            ],
            [
                'nama' => 'Suparno',
                'keterangan' => 'No Wa : 09888\r\nFastrest via wa',
                'status' => 0
            ],
            [
                'nama' => 'Pardi',
                'status' => 1,
                'keterangan' => 'No Telp: 0973123123',

            ],
            [
                'nama' => 'Suparso',
                'keterangan' => 'No Telp: 0973123123',

                'status' => 1
            ],
            [
                'nama' => 'Suparyoso',
                'keterangan' => 'No Telp: 0973123123',

                'status' => 1
            ],
            [
                'nama' => 'Yono',
                'keterangan' => 'No Telp: 0973123123',

                'status' => 1
            ],
            [
                'nama' => 'Parjo',
                'keterangan' => 'Only Sabtu Minggu',
                'status' => 0
            ],
        ];
        DB::table('driver')->insert($drivers);

        // Add Penyewaan
        $penyewaans = [
            [
                'tanggal' => '2023-03-17',
                'waktu' => '11:01:00',
                'keterangan' => 'Bertemu Presiden',
                'driver_id' => 1,
                'kendaraan_id' => 2,
            ],
            [
                'tanggal' => '2023-04-23',
                'waktu' => '10:01:00',
                'keterangan' => 'Ketemu Client',
                'driver_id' => 3,
                'kendaraan_id' => 2,
            ],
            [
                'tanggal' => '2023-05-01',
                'waktu' => '09:01:00',
                'keterangan' => 'Mengantar Ke Rumah',
                'driver_id' => 6,
                'kendaraan_id' => 6,
            ],

        ];
        DB::table('penyewaan')->insert($penyewaans);

        
    }
}
