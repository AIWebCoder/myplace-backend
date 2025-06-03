<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Model\Post;

final readonly class PostList
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        return Post::with(['comments', 'reactions', 'bookmarks', 'attachments'])->get();
    }
}
