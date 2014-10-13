@extends('base.base')

@section('main-content')

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
                @else
                    <li>{{ $post->post_title }}</li>
                @endif

            @endforeach
        </li>
    </ul>

@stop