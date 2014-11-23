    @foreach ($posts as $post)
    <article class="blog-post">
        <header class="page-header">
            <h2 class="blog-post-title">
                <a href="{{ URL::route('blog.post', $post->post_slug) }}">
                    {{ $post->post_title }}
                </a>
            </h2>
            <p class="blog-post-meta">{{{ $post->createdAtFormatted() }}}
                by <strong>{{{ $post->author->username }}}</strong> |
                <a href="{{ URL::route('blog.post', $post->post_slug) }}/#comments">
                    {{ $post->comments()->count() }}
                    {{{ \Illuminate\Support\Pluralizer::plural('Comment', $post->comments()->count()) }}}
                </a>
            </p>
        </header>

        <div class="excerpt">
            {{ $post->post_excerpt }}
        </div>

        <a href="{{{ URL::route('blog.post', $post->post_slug) }}}">Read More...</a>
    </article><!-- /.blog-post -->

    @endforeach

    @if (!isset($searchTerm))
        <?php echo $posts->links(); ?>
    @endif

