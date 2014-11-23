<?php

class BlogController extends BaseController {

	public function getIndex()
	{
        $posts = Post::orderBy('created_at', 'DESC')->paginate(5);

        return View::make('index', array('posts' => $posts));
	}

    public function getPost($post) {
        if (is_null($post)) {
            return App::abort(404);
        }

        $comments = $post->comments()->orderBy('created_at', 'ASC')->get();

        $nextPost = Post::where('created_at', '>', $post->created_at)->first();
        $previousPost = Post::where('created_at', '<', $post->created_at)->orderBy('created_at', 'DESC')->first();

        return View::make('view_post', array(
            "post" => $post,
            "comments" => $comments,
            "previousPost" => $previousPost,
            "nextPost" => $nextPost
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

        $post = new Post;
        $post->fill(Input::all());
        $post->author()->associate(Auth::user());

        $post->save();

        if ($post->id) {
            return Redirect::route('blog.post', array("post_slug" => $post->post_slug));
        }
    }

    public function postNewComment($post) {
        $validationRules = array(
            "content" => 'required|min:3'
        );

        $validator = Validator::make(Input::all(), $validationRules);

        if ($validator->fails()) {
            return Redirect::to(URL::route('blog.post', array("post_slug" => $post->post_slug)) . '#comment-form')
                ->withInput(Input::all())
                ->withErrors($validator);
        }

        $comment = new Comment;
        $comment->fill(Input::all());
        $comment->author()->associate(Auth::user());
        $comment->post()->associate($post);

        $comment->save();

        if ($comment->id) {
            return Redirect::to(URL::route('blog.post', array("post_slug" => $post->post_slug)) .
                "#comment-$comment->id");
        }
    }

    public function getArchive() {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        return View::make('archive', array('posts' => $posts));
    }

    public function getNewSearch() {
        $searchTerm = Input::get('search-term');
        $posts = Post::where('post_title', 'LIKE', '%' . $searchTerm . '%')
            ->where('post_content', 'LIKE', '%' . $searchTerm . '%', 'OR')
            ->where('post_excerpt', 'LIKE', '%' . $searchTerm . '%', 'OR')
            ->orderBy('created_at', 'DESC')
            ->get();

        return View::make('search-results', array(
            'posts' => $posts,
            'searchTerm' => $searchTerm
        ));

    }
}
