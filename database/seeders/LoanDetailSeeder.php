<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LoanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $loanIds = DB::table('loans')->pluck('id')->toArray();
        $bookIds = DB::table('books')->pluck('id')->toArray();

        $details = [];

        for ($i = 1; $i <= 50; $i++) {
            $details[] = [
                'loans_id'    => $loanIds[array_rand($loanIds)],
                'books_id'    => $bookIds[array_rand($bookIds)],
                'is_return'  => $faker->boolean(60),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => now(),
            ];
        }

        DB::table('loan_detail')->insert($details);

        $this->command->info('50 Loan Details seeded.');
    }
}