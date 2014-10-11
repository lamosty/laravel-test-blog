<?php

class BlogController extends BaseController {

    protected $post;

    public function __construct(Post $post) {
        $this->post = $post;

    }

	public function getIndex()
	{
        $posts = $this->post->orderBy('created_at', 'DESC')->paginate(10);

        return View::make('index', array('posts' => $posts));
	}
}
