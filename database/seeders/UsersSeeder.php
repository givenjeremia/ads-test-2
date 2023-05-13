<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'id'=>1,
                'username' => 'admin',
                'password' => '$2y$10$fSQL.2iOPHhM4TcxLM96fOYsgXuVNJwJFFmwzdlNYsLJ4XH/6Q50e',
                'email' => 'admin@gmail.com',
                'role' => 0,
            ],
            [
                'id'=>2,
                'username' => 'suparno',
                'password' => '$2y$10$DbyfZMQ9o0GyhURNWJ01pOE/jXSTTtWd0dL8sdfdefocsYs1TjTli',
                'email' => 'suparno@gmail.com',
                'role' => 1,
            ],
            [
                'id'=>3,
                'username' => 'supardi',
                'password' => '$2y$10$lyH74sMuzJRgP3vkdv/8b.0cjUArh3AWPNnjjADAccqAvtbOXZqsm',
                'email' => 'supardi@gmail.com',
                'role' => 1,
            ],
            [
                'id'=>4,
                'username' => 'given',
                'password' => '$2y$10$r2U.LCpJA.4YlgMDf4SoBuv8brfm6q.g6Us8L/0KJP0URy9ige9fC',
                'email' => 'given@gmail.com',
                'role' => 2,
            ],
            [
                'id'=>5,
                'username' => 'jeremia',
                'password' => '$2y$10$s1TYreuCBHhe2zXhpM5VxOUPds7F.4xovfc0NMLG1y8XQGcAIrl9y',
                'email' => 'jeremia@gmail.com',
                'role' => 2,
            ],
           

        ];
        DB::table('users')->insert($users);
        // Add Persetujuan
        $persetujuans = [
            [
                'user_id' => 2,
                'penyewaan_id' => 1,
                'tanggal_buat' => '2023-02-16',
                'tanggal_setuju' => '2023-02-18',
                'status' => 1,
            ],
            [
                'user_id' => 2,
                'penyewaan_id' => 2,
                'tanggal_buat' => '2023-03-16',
                'tanggal_setuju' => '2023-03-16',
                'status' => 1,
            ],
            [
                'user_id' => 3,
                'penyewaan_id' => 3,
                'tanggal_buat' => '2023-05-10',
                'tanggal_setuju' => '2023-05-11',
                'status' => 0,
            ],
            [
                'user_id' => 4,
                'penyewaan_id' => 1,
                'tanggal_buat' => '2023-04-16',
                'tanggal_setuju' => '2023-04-17',
                'status' => 1,
            ],
            [
                'user_id' => 5,
                'penyewaan_id' => 2,
                'tanggal_buat' => '2023-04-25',
                'tanggal_setuju' => '2023-04-26',
                'status' => 1,
            ],
            [
                'user_id' => 5,
                'penyewaan_id' => 3,
                'tanggal_buat' => '2023-05-01',
                'tanggal_setuju' => '2023-05-02',
                'status' => 1,
            ],


        ];
        DB::table('persetujuan')->insert($persetujuans);
        // DB::table('persetujuan')->insert($persetujuans);

    }
}
