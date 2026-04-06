<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $userNpms = DB::table('users')->pluck('npm')->toArray();

        $loans = [];

        for ($i = 1; $i <= 50; $i++) {
            $loanAt   = $faker->dateTimeBetween('-1 year', 'now');
            $returnAt = (clone $loanAt)->modify('+14 days');

            $loans[] = [
                'users_npm'   => $userNpms[array_rand($userNpms)],
                'loan_at'    => $loanAt->format('Y-m-d'),
                'return_at'  => $returnAt->format('Y-m-d'),
                'created_at' => $loanAt,
                'updated_at' => now(),
            ];
        }

        DB::table('loans')->insert($loans);

        $this->command->info('50 Loans seeded.');
    }
}