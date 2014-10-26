    @foreach ($posts as $post)
    <article class="blog-post">
        <header class="page-header">
            <h2 class="blog-post-title">{{ $post->post_title }}</h2>
            <p class="blog-post-meta">{{{ $post->createdAtFormatted() }}}
                by {{{ $post->author->username }}}
            </p>
        </header>

        <p class="excerpt">
            {{ $post->post_excerpt }}
        </p>

        <a href="{{{ URL::route('blog.post', $post->post_slug) }}}">Read More...</a>
    </article><!-- /.blog-post -->

    @endforeach

    {{--<ul class="pager">--}}
        {{--<li class="previous disabled"><a href="#">&larr; Previous</a></li>--}}
        {{--<li class="next"><a href="#">Next &rarr;</a></li>--}}
    {{--</ul>--}}
