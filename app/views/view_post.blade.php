@extends('base.base')

@section('head.title')
    {{ $post->post_title }}
@stop

@section('main-content')
<article class="blog-post">
    <header class="page-header">
        <h1>{{ $post->post_title }}</h1>
        <p class="blog-post-meta">{{{ $post->createdAtFormatted() }}}
            by {{{ $post->author->username }}}
        </p>
    </header>


    {{ $post->post_content }}

    <hr/>

    <ul class="pager">
    @if ($previousPost)
        <li class="previous"><a href="{{ URL::route('blog.post', $previousPost->post_slug) }}">&larr; Previous Post</a></li>
    @else
        <li class="previous disabled"><a>&larr; Previous Post</a></li>
    @endif
    @if ($nextPost)
        <li class="next"><a href="{{ URL::route('blog.post', $nextPost->post_slug) }}">Next Post &rarr;</a></li>
    @else
        <li class="next disabled"><a>Next Post &rarr;</a></li>
    @endif
    </ul>

    <h4>
        {{{ $comments->count() }}}
        {{{ \Illuminate\Support\Pluralizer::plural('Comment', $comments->count()) }}}
    </h4>

    @if ($comments->count())
    <section class="comments">
    @foreach ($comments as $comment)
        <article class="comment">
            <div class="comment-heading">
                <strong>{{{ $comment->author->username }}}</strong> - {{{ $comment->createdAtFormatted() }}}
            </div>
            <div class="comment-content">
                {{ $comment->content() }}
            </div>
        </article>
    @endforeach
    </section>
    @endif



    @if (Auth::check())
    @include('partials.comment-form')
    @else
    <p>
        <a href="{{ URL::route('user.login') }}">Login</a> or
        <a href="{{ URL::route('user.create') }}">register</a> in order to be able to comment.
    </p>
    @endif
</article><!-- /.blog-post -->
@stop