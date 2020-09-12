<?php

namespace Tests\Feature\Api\Books;

use App\Models\Book;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BooksControllerTest extends TestCase
{
    use WithoutMiddleware;

    public function testBooksIndex()
    {
        $user = User::factory()->create();

        $response = $this->json('GET', route('books.index'), [], [], [], [
            "HTTP_Authorization" => "Basic {base64_encode({$user->username} ':password')}",
            "PHP_AUTH_USER" => $user->username,
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(200);
    }

    public function testBookShow()
    {
        $user = User::factory()->create();
        $book = User::factory()->create();

        $this->json('GET', route('books.show', $book->id), [], [], [], [
            "HTTP_Authorization" => "Basic {base64_encode({$user->username} ':password')}",
            "PHP_AUTH_USER" => "$user->username",
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(200);
    }

    public function testBookStore()
    {
        $user = User::factory()->create();

        $data = [
            'title' => "title #2",
            'price' => "price #2",
            'author' => "author #2",
            'editor'=> "editor #2",
        ];

        $response = $this->json('POST', route('books.store'), $data, [], [], [
            "HTTP_Authorization" => "Basic {base64_encode({$user->username} ':password')}",
            "PHP_AUTH_USER" => $user->username,
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(201);
	}

    public function testBookUpdate()
    {
        $user = User::factory()->create();

        $data = [
            'id' => 1,
            'title' => "title #1 update",
            'price' => "price #1 update",
            'author' => "author #1 update",
            'editor'=> "editor #1 update",
        ];
        
        $this->json('PUT', route('books.update', 1), $data, [], [], [
            "HTTP_Authorization" => "Basic {base64_encode({$user->username} ':password')}",
            "PHP_AUTH_USER" => $user->username,
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(200);
    }

    public function testBookDelete()
    {
        $book = Book::factory()->create();
        $user = User::factory()->create();

        $this->json('DELETE', route('books.destroy', $book->id), [], [], [], [
            "HTTP_Authorization" => "Basic {base64_encode({$user->username} ':password')}",
            "PHP_AUTH_USER" => "$user->username",
            "PHP_AUTH_PW" => "password"
        ])->assertStatus(204);
    }
}
