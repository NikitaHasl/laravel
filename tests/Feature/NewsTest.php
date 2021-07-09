<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_news_list_status()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }

    public function test_news_show_status()
    {
        $id = mt_rand(0, 19);
        $response = $this->get("/news/$id");

        $response->assertStatus(200);
    }

    public function test_news_list_template()
    {
        $response = $this->get("/news");
        $response->assertViewIs('news.index');
    }

    public function test_news_show_template()
    {
        $id = mt_rand(0, 19);
        $response = $this->get("/news/$id");
        $response->assertViewIs('news.show');
    }

    public function test_news_list_view()
    {
        $view = $this->view('news.index', [
            'newsList' => [
                [
                    'title' => 'Новость1',
                    'category' => 'IT',
                    'description' => 'description'
                ]
            ]
        ]);

        $view->assertSee('IT');
        $view->assertSee('Новость1');
        $view->assertSeeInOrder(['Новость1', 'IT']);
        $view->assertDontSee('TI');
        $view->assertDontSee('Новость2');
    }

    public function test_news_show_view()
    {
        $view = $this->view('news.show', [
            'news' => [
                'title' => 'Новость4',
                'category' => 'Cars',
                'description' => 'description text'
            ]
        ]);

        $view->assertSee('Cars');
        $view->assertSee('Новость4');
        $view->assertSeeInOrder(['Новость4', 'Cars', 'description text']);
        $view->assertDontSee('IT');
        $view->assertDontSee('cars');
    }
}
