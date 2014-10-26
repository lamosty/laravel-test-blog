<?php

Route::bind('post', function($value, $route) {
    $post = Post::where('post_slug', '=', $value)->firstOrFail();

    return $post;
});
