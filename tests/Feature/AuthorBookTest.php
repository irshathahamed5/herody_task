<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorBookTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_author(): void
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'bio' => 'A famous author.'
        ];

        $response = $this->postJson('/api/authors', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data);
        
        $this->assertDatabaseHas('authors', $data);
    }

    public function test_can_create_book_for_author(): void
    {
        $author = \App\Models\Author::create([
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);

        $data = [
            'title' => 'My First Book',
            'description' => 'A great book.',
            'published_at' => '2023-01-01',
            'author_id' => $author->id
        ];

        $response = $this->postJson('/api/books', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data);

        $this->assertDatabaseHas('books', $data);
    }

    public function test_can_get_authors_with_books(): void
    {
        $author = \App\Models\Author::create([
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);

        \App\Models\Book::create([
            'title' => 'Book 1',
            'author_id' => $author->id
        ]);

        $response = $this->getJson('/api/authors');

        $response->assertStatus(200)
                 ->assertJsonCount(1)
                 ->assertJsonStructure([
                     '*' => ['id', 'name', 'email', 'bio', 'books']
                 ]);
    }
}
