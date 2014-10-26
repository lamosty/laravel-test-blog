@extends('base.base')

@section('head.title')
    The Most Awesome Technical Blog Around
@stop

@section('main-content')
    <div class="jumbotron">
        <h1>Lamosty's Blog</h1>
        <p>The most awesome technical blog around.</p>
    </div>

    @include('partials.post-listing', array('posts' => $posts))
@stop