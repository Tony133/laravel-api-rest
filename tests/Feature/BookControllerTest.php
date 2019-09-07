<?php

namespace Tests\Feature;

use App\Book;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookControllerTest extends TestCase
{
    use WithoutMiddleware;

    protected function setUp(): void
    {
        parent::setUp();
        $this->book = factory(Book::class)->create();
    }

    public function testListBooks()
    {
        $response = $this->json('GET', route('books.index'));

        $response->assertStatus(200);
    }

    public function testBookShow()
    {
        $response = $this->json('GET', route('books.show', $this->book->id));

        $response->assertStatus(200);
    }

    public function testBookNew()
    {
        $data = [
            'title'  => $this->book->title,
            'price' => $this->book->price,
            'author' => $this->book->author,
            'editor'=> $this->book->editor
        ];

        $this->json('POST', route('books.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
	}

    public function testBookUpdate()
    {
        $data = [
            'title'  => $this->book->title,
            'price' => $this->book->price,
            'author' => $this->book->author,
            'editor'=> $this->book->editor
        ];

        $this->json('PUT', route('books.update', $this->book->id), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function testBookDelete()
    {
        $this->json('DELETE', route('books.delete', $this->book->id))
            ->assertStatus(204);
    }
}
