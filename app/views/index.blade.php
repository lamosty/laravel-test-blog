@extends('base.base')

@section('main-content')

    @foreach ($posts as $post)
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->post_title }}</h2>
        <p class="blog-post-meta">{{{ $post->createdAtFormatted() }}} by Mark</p>

        {{ $post->post_excerpt }}


        <a href="" class="btn btn-primary btn-sm read-more-btn" role="button">Read More...</a>
    </div><!-- /.blog-post -->

    @endforeach

@stop