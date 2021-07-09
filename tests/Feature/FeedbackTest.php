<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_feedback_status()
    {
        $response = $this->get('/feedback');

        $response->assertStatus(200);
    }

    public function test_feedback_template()
    {
        $response = $this->get('/feedback');
        $response->assertViewIs('feedback');
    }

    public function test_feedback_view()
    {
        $view = $this->view('feedback');
        $view->assertSee('Email');
        $view->assertSee('Имя пользователя');
        $view->assertSeeInOrder(['Имя пользователя', 'Email', 'Текст обращения', 'Отправить']);
    }
}
