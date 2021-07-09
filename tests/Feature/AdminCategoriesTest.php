<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminCategoriesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_categories_list_status()
    {
        $response = $this->get('/admin/categories');
        $response->assertStatus(200);
    }

    public function test_admin_categories_create_status()
    {
        $response = $this->get('/admin/categories/create');
        $response->assertStatus(200);
    }

    public function test_admin_categories_list_template()
    {
        $response = $this->get('/admin/categories');
        $response->assertViewIs('admin.categories.index');
    }
    public function test_admin_categories_create_template()
    {
        $response = $this->get('/admin/categories/create');
        $response->assertViewIs('admin.categories.create');
    }

    public function test_admin_categories_list_view()
    {
        $view = $this->view('admin.categories.index', [
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
    }
}
