@extends('master')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <h1>Add new user {!! $customer->first_name !!}</h1>

        {!! Form::open(['method' => 'POST', 'route' => ['admin', $customer->id]]) !!}

        {{--{{ Form::model($user, array('route' => array('users.update', $user->id))) }}--}}

        <div class="form-group">
            {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First name']) !!}
        </div>
        <div class="form-group">
            {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last name']) !!}
        </div>

        <div class="form-group">
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email...']) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>')  !!}
        </div>

        <div class="form-group">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password...']) !!}
        </div>
        <div class="form-group">
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm password...']) !!}
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::submit('Register', ['class' => 'form-control btn btn-default']) !!}
            </div>
        </div>

        {!! Form::close() !!}

    </div>
    @include('errors.error')

@stop
