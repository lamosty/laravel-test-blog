@extends('base.base')

@section('main-content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">Login</h2>
    </div>
    <div class="panel-body">
     {{ Form::open(array('route' => 'user.post_login', 'role' => 'form', 'class' => 'form-horizontal')) }}

        @if (!empty($from))
        {{ Form::hidden('from', $from) }}
        @endif

         <div class="form-group">
             {{ Form::label('username', 'Username', array('class' => 'col-sm-3 control-label')) }}
             <div class="col-sm-4">
                 {{ Form::text('username', null, array(
                     'class' => 'form-control',
                     'placeholder' => 'Username'))
                 }}
             </div>
         </div>

         <div class="form-group">
             {{ Form::label('password', 'Password', array('class' => 'col-sm-3 control-label')) }}
             <div class="col-sm-4">
                 {{ Form::password('password',
                     array('class' => 'form-control', 'placeholder' => 'Password'))
                 }}
             </div>
         </div>

         <div class="form-group">
             <div class="col-sm-offset-3 col-sm-9">
                 {{ Form::submit('Login', array('class' => 'btn btn-default')) }}
             </div>
         </div>

     {{ Form::close() }}
    </div>
</div>

@stop