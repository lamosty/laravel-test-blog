@extends('base.base')

@section('main-content')

    <div class="jumbotron">
        <h1>Lamosty's Blog</h1>
        <p>The most awesome technical blog around.</p>
    </div>

    @include('partials.post-listing', array('posts' => $posts))

@stop