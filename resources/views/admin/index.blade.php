@extends('master')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <h1>Hi, {!! $customer->first_name !!}</h1>

        {!!  link_to_action('CustomersController@create', 'Create new user', ["id" => Auth::user()->id], ["class" => 'btn btn-default', "style" => "margin-top:10px;"])  !!}


    </div>
    @include('errors.error')

@stop
