<?php

class BlogController extends BaseController {

    protected $post;

    public function __construct(Post $post) {
        $this->post = $post;

    }

	public function getIndex()
	{
        $posts = $this->post->orderBy('created_at', 'DESC');

        return View::make('index', array('posts' => $posts));
	}
}
