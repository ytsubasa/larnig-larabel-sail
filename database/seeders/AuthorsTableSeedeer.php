<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorsTableSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $faker = \Faker\Factory::create('ja_jp');
        for ($i = 1; $i <= 10; $i++) {
            $author = [
                'name' => $faker->name,
                'kana' => $faker->kanaName,
                'created_at' => now(),
                'updated_at'  => now(),
            ];
            \Illuminate\Support\Facades\DB::table('authors')->insert($author);

        }
    }
}
