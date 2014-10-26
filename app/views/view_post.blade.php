@extends('base.base')

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