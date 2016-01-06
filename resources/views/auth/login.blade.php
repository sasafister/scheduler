@extends('master')

@section('content')

    <div class="col-md-6 col-md-offset-3">
    <h1>Login</h1>

    {!! Form::open(['url' => ' ', 'method' => 'POST']) !!}

        <div class="form-group">
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email...']) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>')  !!}
        </div>

        <div class="form-group">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password...']) !!}
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::submit('Login', ['class' => 'form-control btn btn-default']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! link_to("auth/register", "Register", ["class" => "form-control btn btn-default"]) !!}
            </div>
        </div>
    {!! Form::close() !!}

    </div>

@stop