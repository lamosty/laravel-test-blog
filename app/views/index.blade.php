@extends('base.base')

@section('head.title')
    The Most Awesome Technical Blog Around
@stop

@section('main-content')
    @include('partials.post-listing', array('posts' => $posts))
@stop