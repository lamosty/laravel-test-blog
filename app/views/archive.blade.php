@extends('base.base')

@section('head.title')
    Posts Archive
@stop

@section('main-content')

    <div class="page-header">
        <h1>Posts archive</h1>
    </div>

    <?php $lastMonth = $posts[0]->getCreatedAtMonthYear(); ?>

    <ul class="archive-list">
        <li>{{ $lastMonth }}
            <ul class="archive-list-month">

            @foreach ($posts as $post)

                @if ($lastMonth != $post->getCreatedAtMonthYear())
                    <?php $lastMonth = $post->getCreatedAtMonthYear(); ?>

                    </ul>
                </li>
                <li>{{ $lastMonth }}
                    <ul class="archive-list-month">
                @endif

                <li>
                    <a href="{{ URL::route('blog.post', $post->post_slug) }}">{{ $post->post_title }}</a>
                </li>

            @endforeach
        </li>
    </ul>

@stop