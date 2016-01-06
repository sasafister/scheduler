@extends('master')

@section('content')
    <div class="row">
        <div class="col s4 offset-s3">

            <h1>Login</h1>

            {!! Form::open(['url' => '/', 'method' => 'POST']) !!}

                <div class="input-field">
                    {!! Form::text('email', null, ['class' => 'validate', 'placeholder' => 'Email...']) !!}
                </div>
                <div class="input-field">
                    {!! Form::password('password', ['class' => 'validate', 'placeholder' => 'Password...']) !!}
                </div>
                <div>
                    {!! Form::submit("Login", ['class' => 'btn waces-effect waves-light col s12', 'style' => 'margin-bottom:10px;']) !!}
                </div>
                <div>
                    {!! link_to("auth/register", "Register", ["class" => "btn waves-effect waves-light col s12"]) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop