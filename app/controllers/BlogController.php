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

    public function getNewPost() {
        return View::make('new_post');
    }

    public function postNewPost() {
        $validationRules = array(
            'post_title' => 'required|min:3',
            'post_slug' => 'required|min:3|unique:posts,post_slug',
            'post_excerpt' => 'required|min:3',
            'post_content' => 'required|min:3'
        );

        $validator = Validator::make(Input::all(), $validationRules);

        if ($validator->fails()) {
            return Redirect::route('post.create')
                ->withInput(Input::all())
                ->withErrors($validator);
        }

        $this->post = new Post;
        $this->post->fill(Input::all());
        $this->post->author()->associate(Auth::user());

        $this->post->save();

        if ($this->post->id) {
            return Redirect::route('blog.post', array("post_slug" => $this->post->post_slug))
                ->with('success', 'Your account has been created. You can login now.');
        }
    }
}
