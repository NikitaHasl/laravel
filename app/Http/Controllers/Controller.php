<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $news;
    protected array $newsCategories = [
        'IT',
        'Politics',
        'Science',
        'Cars',
        'Weapon'
    ];

    protected function getNews()
    {
        $faker = Factory::create('ru_Ru');
        for ($i = 1; $i <= 20; $i++) {
            $this->news[] = [
                'title' => "Новость {$i}",
                'category' => "{$this->newsCategories[$i % 5]}",
                'description' => $faker->text(100)
            ];
        }

        return $this->news;
    }
}
