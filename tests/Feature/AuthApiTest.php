<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;
    public function test_login_api_requires_credentials()
    {
        $response = $this->postJson('/login-api', []);
        $response->assertStatus(422); 
    }

    public function test_register_api_creates_user()
    {
        $response = $this->postJson('/register-api', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $response->assertStatus(201);
        $response->assertJsonStructure(['user', 'token']);
    }

    public function test_fetch_all_post_returns_posts()
    {
        $response = $this->getJson('/fetch-all-post');
        $response->assertStatus(200);
        $response->assertJsonStructure([[
            'id', 'comments', 'reactions', 'bookmarks', 'attachments'
        ]]);
    }
}
