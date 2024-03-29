<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0; $i < 20; $i++) {
            $title = $faker->sentence(mt_rand(3, 5));
            $slug = Str::slug($title);
            $data[] = [
                'category_id' => (mt_rand(1, 10)),
                'user_id' => (mt_rand(1, 10)),
                'title' => $title,
                'slug' => $slug,
                'description' => $faker->text(250),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return $data;
    }
}
