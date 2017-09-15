<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookControllerTest extends TestCase
{
    use WithoutMiddleware;

    public function testIndex()
    {
        $response = $this->json('GET', '/api/books');

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $response = $this->json('GET', '/api/books', ['id' => '1']);

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $response = $this->json('POST', '/api/books', [
                'title' => 'Book PHP',
                'price' => '19.99',
                'author' => 'author_test',
                'editor' => 'editor_test'
        ]);

		$response->assertStatus(200);
	}

    public function testUpdate()
    {
        $response = $this->json('PUT', '/api/books/1', [
                'id' => '1',
                'title' => 'Book PHP Programming',
                'price' => '29.99',
                'author' => 'author_test',
                'editor' => 'editor_test'
        ]);

        $response->assertStatus(200);
    }

    public function testDestory()
    {
        $response = $this->json('DELETE', '/api/books/4', ['id' => '3']);

        $response->assertStatus(200);
    }
}
