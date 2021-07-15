<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }

    public function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $gender = $faker->randomElement(['male', 'female']);
            $data[] = [
                'firstname' => $faker->firstName($gender),
                'surname' => $faker->lastName(),
                'email' => $faker->unique()->email(),
                'birthday' => $faker->date(),
                'gender' => $gender,
                'role' => 'user',
                'password_hash' => $faker->sha1(),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        return $data;
    }
}
