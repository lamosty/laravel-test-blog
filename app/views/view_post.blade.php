@extends('base.base')

@section('main-content')

<div class="blog-post">
    <h2 class="blog-post-title">{{ $post->post_title }}</h2>
    <p class="blog-post-meta">{{{ $post->createdAtFormatted() }}}
        by {{{ $post->author->username }}}
    </p>

    {{ $post->post_content }}

    <hr/>
    <h4>
        {{{ $comments->count() }}}
        {{{ \Illuminate\Support\Pluralizer::plural('Comment', $comments->count()) }}}
    </h4>

    @if ($comments->count())
    <div class="comments">
    @foreach ($comments as $comment)
        <div class="comment">
            <div class="comment-heading">
                <strong>{{{ $comment->author->username }}}</strong> - {{{ $comment->createdAtFormatted() }}}
            </div>
            <div class="comment-content">
                {{ $comment->content() }}
            </div>
        </div>
    @endforeach
    </div>
    @endif
    <hr/>

</div><!-- /.blog-post -->

@stop