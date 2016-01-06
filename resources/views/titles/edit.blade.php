@extends('master')

@section('content')

    <h1>Zimo Scheduler</h1>
    {!!  Form::model($title, ["method" => "PATCH", "action" => ["TitlesController@update", $id, $title->id]]) !!}
        @include('partials.form', ['submitButtonText' => 'Ažuriraj', 'user' => $title->user->name, 'time' => \Carbon\Carbon::parse($title->created_at)->format('d.m.Y.') ])
    {!! Form::close() !!}
    <!-- /. -->
    {!! link_to_action('TitlesController@index', 'Back', [$id], ["class" => "btn waces-effect waves-light", "style" => "margin-top:15px;"]) !!}

@stop


