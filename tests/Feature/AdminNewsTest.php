<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminNewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_news_list_status()
    {
        $response = $this->get('/admin/news');
        $response->assertStatus(200);
    }

    public function test_admin_news_create_status()
    {
        $response = $this->get('/admin/news/create');
        $response->assertStatus(200);
    }

    public function test_admin_news_list_template()
    {
        $response = $this->get('/admin/news');
        $response->assertViewIs('admin.news.index');
    }

    public function test_admin_news_create_template()
    {
        $response = $this->get('/admin/news/create');
        $response->assertViewIs('admin.news.create');
    }

    public function test_admin_news_list_view()
    {
        $view = $this->view('admin.news.index', [
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
        $view->assertSeeInOrder(['Новость1', 'IT', 'description']);
        $view->assertDontSee('Weapon');
        $view->assertDontSee('Новость2');
    }
    public function test_admin_news_create_view()
    {
        $view = $this->view('admin.news.create');
        $view->assertSee('Заголовок');
        $view->assertSee('Статус');
        $view->assertSeeInOrder(['Заголовок', 'Статус', 'Описание', 'Сохранить']);
    }

    public function test_admin_start_page_status()
    {
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }

    public function test_admin_start_page_template()
    {
        $response = $this->get('/admin');
        $response->assertViewIs('admin.index');
    }
}
