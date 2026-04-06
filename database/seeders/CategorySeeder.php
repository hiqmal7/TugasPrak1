<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Fiksi', 'Non-Fiksi', 'Sains', 'Teknologi', 'Sejarah',
            'Biografi', 'Filsafat', 'Ekonomi', 'Hukum', 'Pendidikan',
        ];

        $data = array_map(fn($cat) => ['category' => $cat], $categories);

        DB::table('categories')->insert($data);

        $this->command->info('Categories seeded.');
    }
}