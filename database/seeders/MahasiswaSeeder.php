<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Faker seeder
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 15; $i++) {

            // insert data ke table pegawai menggunakan Faker
            \Illuminate\Support\Facades\DB::table('mahasiswa')->insert([
                'username' => $faker->name,
                'address' => $faker->address,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

            ]);
        }
    }
}
