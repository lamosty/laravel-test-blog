@extends('base.base')

@section('main-content')

    <div class="page-header">
        <h1>Search results for term '{{{ $searchTerm }}}'</h1>
    </div>

    @include('partials.post-listing', array('posts' => $posts))

@stop