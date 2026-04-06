<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookshelfSeeder extends Seeder
{
    public function run(): void
    {
        $shelves = [];

        for ($i = 1; $i <= 10; $i++) {
            $shelves[] = [
                'code' => 'RAK-' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'name' => 'Rak Buku ' . $i,
            ];
        }

        DB::table('bookshelfs')->insert($shelves);

        $this->command->info('Bookshelfs seeded.');
    }
}