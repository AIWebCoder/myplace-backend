<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_save_post()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->postJson('/posts/save', [
            'title' => 'Test Post',
            'content' => 'This is a test post content.',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('posts', ['title' => 'Test Post']);
    }
}
