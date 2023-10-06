<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            'nama' => 'Domi',
            'nomor_induk' => '1',
            'alamat' => 'Baturaden',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama' => 'Wiharto',
            'nomor_induk' => '2',
            'alamat' => 'Mersi',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama' => 'Feti',
            'nomor_induk' => '3',
            'alamat' => 'Purbalingga',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
