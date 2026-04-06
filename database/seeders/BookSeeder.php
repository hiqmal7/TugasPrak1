<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $bookshelfIds = DB::table('bookshelfs')->pluck('id')->toArray();

        $books = [];

        for ($i = 1; $i <= 50; $i++) {
            $books[] = [
                'title'        => $faker->sentence(rand(2, 5), false),
                'author'       => $faker->name(),
                'year'         => $faker->year(),
                'publisher'    => $faker->company(),
                'city'         => $faker->city(),
                'cover'        => 'covers/book_' . $i . '.jpg',
                'bookshelfs_id' => $bookshelfIds[array_rand($bookshelfIds)],
                'created_at'   => $faker->dateTimeBetween('-3 years', 'now'),
                'updated_at'   => now(),
            ];
        }

        DB::table('books')->insert($books);

        $this->command->info('50 Books seeded.');
    }
}