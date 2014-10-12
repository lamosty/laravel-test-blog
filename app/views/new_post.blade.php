@extends('base.base')

@section('main-content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">Create New Post</h2>
    </div>
    <div class="panel-body">
    {{ Form::open(array('route' => 'blog.post_new_post', 'role' => 'form', 'class' => 'form-horizontal')) }}

        <div class="form-group @if($errors->has('post_title')) has-error @endif">
            {{ Form::label('post_title', 'Title', array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-9">
                {{ Form::text('post_title', null, array(
                    'class' => 'form-control',
                    'placeholder' => 'Title of your new post'))
                }}
            </div>
            @if($errors->has('post_title'))
            <span class="text-danger">{{ $errors->first('post_title') }}</span>
            @endif
        </div>

        <div class="form-group @if($errors->has('post_slug')) has-error @endif">
            {{ Form::label('post_slug', 'Slug (URL of post)', array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-9">
                {{ Form::text('post_slug', null,
                    array('class' => 'form-control', 'placeholder' => 'title_of_your_new_post'))
                }}
            </div>
            @if($errors->has('post_slug'))
            <span class="text-danger">{{ $errors->first('post_slug') }}</span>
            @endif
        </div>

        <div class="form-group @if($errors->has('post_excerpt')) has-error @endif">
            {{ Form::label('post_excerpt', 'Excerpt (Perex)',
                array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-9">
                {{ Form::textarea('post_excerpt', null,
                    array('class' => 'form-control', 'placeholder' => '...and there was a tree...',
                          'rows' => '3'))
                }}
            </div>
            @if($errors->has('post_excerpt'))
            <span class="text-danger">{{ $errors->first('post_excerpt') }}</span>
            @endif
        </div>

        <div class="form-group @if($errors->has('post_content')) has-error @endif">
            {{ Form::label('post_content', 'Content',
                array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-9">
                {{ Form::textarea('post_content', null,
                    array('class' => 'form-control', 'placeholder' => 'Lamosty the besty'))
                }}
            </div>
            @if($errors->has('post_content'))
            <span class="text-danger">{{ $errors->first('post_content') }}</span>
            @endif
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                {{ Form::submit('New Post', array('class' => 'btn btn-default')) }}
            </div>
        </div>

    {{ Form::close() }}
    </div>
</div>

@stop