<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_category_list_status()
    {
        $response = $this->get('/categories');

        $response->assertStatus(200);
    }

    public function test_category_show_status()
    {
        $id = mt_rand(0, 4);
        $response = $this->get("/categories/$id");

        $response->assertStatus(200);
    }

    public function test_category_list_template()
    {
        $response = $this->get('/categories');
        $response->assertViewIs('categories.index');
    }

    public function test_category_show_template()
    {
        $id = mt_rand(0, 4);
        $response = $this->get("/categories/$id");
        $response->assertViewIs('categories.show');
    }

    public function test_category_list_view()
    {
        $view = $this->view('categories.index', [
            'categoryList' => [
                'IT',
                'Politics',
                'Science',
                'Cars',
                'Weapon'
            ]
        ]);

        $view->assertSee('IT');
        $view->assertSee('Cars');
        $view->assertSee('Science');
        $view->assertSeeInOrder(['IT', 'Politics', 'Science', 'Cars', 'Weapon']);
        $view->assertDontSee('PHP');
        $view->assertDontSee('Book');
    }
    public function test_category_show_view()
    {
        $id = mt_rand(0, 4);
        $categories = [
            'IT',
            'Politics',
            'Science',
            'Cars',
            'Weapon'
        ];
        $view = $this->view('categories.show', [
            'newsList' => [
                [
                    'title' => 'Новость1',
                    'category' => 'IT',
                    'description' => 'description'
                ], [
                    'title' => 'Новость2',
                    'category' => 'Politics',
                    'description' => 'description'
                ], [
                    'title' => 'Новость3',
                    'category' => 'Science',
                    'description' => 'description'
                ], [
                    'title' => 'Новость4',
                    'category' => 'Cars',
                    'description' => 'description'
                ], [
                    'title' => 'Новость5',
                    'category' => 'Weapon',
                    'description' => 'description'
                ]
            ],
            'category' => $categories[$id],
        ]);
        $view->assertSee("$categories[$id]");
        $view->assertSee('description');
    }
}
