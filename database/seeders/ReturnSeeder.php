<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReturnSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $returnedDetails = DB::table('loan_detail')
            ->where('is_return', true)
            ->pluck('id')
            ->toArray();

        if (empty($returnedDetails)) {
            $this->command->warn('No returned loan details found. Skipping ReturnSeeder.');
            return;
        }

        $selectedIds = array_slice($returnedDetails, 0, 50);

        $returns = [];

        foreach ($selectedIds as $detailId) {
            $hasCharge = $faker->boolean(30);

            $returns[] = [
                'loan_detail_id' => $detailId,
                'charge'         => $hasCharge,
                'amount'         => $hasCharge ? $faker->numberBetween(1000, 50000) : 0,
            ];
        }

        DB::table('returns')->insert($returns);

        $this->command->info(' ' . count($returns) . ' Returns seeded.');
    }
}