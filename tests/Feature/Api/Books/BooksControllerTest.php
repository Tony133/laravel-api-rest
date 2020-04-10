<?php

namespace Tests\Feature\Api\Books;

use App\Book;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BooksControllerTest extends TestCase
{
    use WithoutMiddleware, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->book = factory(Book::class)->create();
        $this->user = factory(User::class)->create();
    }

    public function testBooksIndex()
    {
        $response = $this->json('GET', route('books.index'), [], [], [], [
            "HTTP_Authorization" => "Basic " . base64_encode($this->user->username . ":" . "password"),
            "PHP_AUTH_USER" => $this->user->username,
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(200);
    }

    public function testBookShow()
    {
        $response = $this->json('GET', route('books.show', $this->book), [], [], [], [
            "HTTP_Authorization" => "Basic " . base64_encode($this->user->username . ":" . "password"),
            "PHP_AUTH_USER" => $this->user->username,
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(200);
    }

    public function testBookStore()
    {
        $data = [
            'title'  => $this->book->title,
            'price' => $this->book->price,
            'author' => $this->book->author,
            'editor'=> $this->book->editor,
            'updated_at' => $this->book->updated_at,
            'created_at' => $this->book->created_at
        ];

        $response = $this->json('POST', route('books.store'), $data, [], [], [
            "HTTP_Authorization" => "Basic " . base64_encode($this->user->username . ":" . "password"),
            "PHP_AUTH_USER" => $this->user->username,
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(201);
	}

    public function testBookUpdate()
    {
        $data = [
            'id' => $this->book->id,
            'title'  => $this->book->title,
            'price' => $this->book->price,
            'author' => $this->book->author,
            'editor'=> $this->book->editor,
            'updated_at' => $this->book->updated_at,
            'created_at' => $this->book->created_at
        ];

        $this->json('PUT', route('books.update', $this->book->id), $data, [], [], [
            "HTTP_Authorization" => "Basic " . base64_encode($this->user->username . ":" . "password"),
            "PHP_AUTH_USER" => $this->user->username,
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(200);
    }

    public function testBookDelete()
    {
        $this->json('DELETE', route('books.destroy', $this->book), [], [], [], [
            "HTTP_Authorization" => "Basic " . base64_encode($this->user->username . ":" . "password"),
            "PHP_AUTH_USER" => $this->user->username,
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(204);
    }
}
