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

    public function getPost($post_slug) {
        $post = $this->post->where('post_slug', '=', $post_slug)->first();

        if (is_null($post)) {
            return App::abort(404);
        }

        $comments = $post->comments()->orderBy('created_at', 'ASC')->get();

        return View::make('view_post', array(
            "post" => $post,
            "comments" => $comments
        ));
    }
}
