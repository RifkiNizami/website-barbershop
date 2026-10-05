<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_gallery_page_returns_successful_response(): void
    {
        $response = $this->get('/gallery');

        $response->assertStatus(200);
        $response->assertSee('Katalog & Portofolio', false);
    }
}
