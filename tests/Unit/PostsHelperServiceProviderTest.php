<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Providers\PostsHelperServiceProvider;

class PostsHelperServiceProviderTest extends TestCase
{
    public function test_getUserPosts_returns_expected_data()
    {
        // Arrange - Setup fake user id or mock DB
        $userId = 1;

        // Act
        $posts = PostsHelperServiceProvider::getUserPosts($userId, false, 1, false, true);

        // Assert
        $this->assertIsArray($posts);
        // Add more assertions as needed
    }
}
