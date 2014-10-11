@extends('base.base')

@section('main-content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">Register a new account</h2>
    </div>
    <div class="panel-body">
    {{ Form::open(array('route' => 'user.post_create', 'role' => 'form', 'class' => 'form-horizontal')) }}

        <div class="form-group @if($errors->has('username')) has-error @endif">
            {{ Form::label('username', 'Username', array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-4">
                {{ Form::text('username', null, array(
                    'class' => 'form-control',
                    'placeholder' => 'Desired Username'))
                }}
            </div>
            @if($errors->has('username'))
            <span class="text-danger">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group @if($errors->has('username')) has-error @endif">
            {{ Form::label('password', 'Password', array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-4">
                {{ Form::password('password',
                    array('class' => 'form-control', 'placeholder' => 'Desired Password'))
                }}
            </div>
            @if($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group @if($errors->has('username')) has-error @endif">
            {{ Form::label('password_confirmation', 'Password again',
                array('class' => 'col-sm-3 control-label')) }}
            <div class="col-sm-4">
                {{ Form::password('password_confirmation',
                    array('class' => 'form-control', 'placeholder' => 'Password Again'))
                }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                {{ Form::submit('Register Me', array('class' => 'btn btn-default')) }}
            </div>
        </div>

    {{ Form::close() }}
    </div>
</div>

@stop