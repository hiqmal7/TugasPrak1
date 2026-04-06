<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $angkatanList = ['21', '22', '23', '24', '25'];
        $kodeJurusan  = '55201';

        $users = [];

        for ($i = 1; $i <= 50; $i++) {
            $angkatan = $angkatanList[array_rand($angkatanList)];
            $urutan   = str_pad($i, 3, '0', STR_PAD_LEFT);
            $npm      = $kodeJurusan . $angkatan . $urutan;

            $users[] = [
                'npm'               => $npm,
                'username'          => $faker->unique()->userName(),
                'first_name'        => $faker->firstName(),
                'last_name'         => $faker->lastName(),
                'email'             => $faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'created_at'        => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at'        => now(),
            ];
        }

        DB::table('users')->insert($users);

        $this->command->info('50 Users seeded with NPM format: ' . $kodeJurusan . '{angkatan}{urutan}');
    }
}