<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StartPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_start_page_status()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_start_page_template()
    {
        $response = $this->get('/');
        $response->assertViewIs('start');
    }
}
