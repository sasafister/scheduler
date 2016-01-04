@extends('master')

@section('content')

    <h1>Zimo Scheduler</h1>
    {!!  Form::model($title, ["method" => "PATCH", "action" => ["TitlesController@update", $id, $title->id], "class" => "form-inline"]) !!}
        @include('partials.form', ['submitButtonText' => 'Ažuriraj', 'user' => $title->user->name, 'time' => $title->time])
    {!! Form::close() !!}
    {!! link_to_action('TitlesController@index', 'Back', [$id], ["class" => "btn btn-default", "style" => "margin-top:15px;"]) !!}

@stop


