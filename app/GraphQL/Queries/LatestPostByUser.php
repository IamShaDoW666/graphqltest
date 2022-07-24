<?php

namespace App\GraphQL\Queries;

use App\Models\Post;
use App\Models\User;

final class LatestPostByUser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return Post::query()
                ->where('user_id', $args['id'])
                ->get()
                ->last();
    }
}
