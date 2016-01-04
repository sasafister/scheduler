@extends('master')

@section('content')

    <h1>Zimo Scheduler</h1>
        {!!  Form::open(["method" => "POST", "action" => ["TitlesController@store", $customerId], "class" => "form-inline"]) !!}
        {!! csrf_field() !!}
           @include('partials.form', ['submitButtonText' => 'Planiraj', 'user' => $allUsers, 'time' => Carbon\Carbon::now()->format('h:i')])
        {!! Form::close() !!}
    <table class="table" style="margin-top: 10px;">
                <thead>
                <tr>
                    <th class="col-md-1"></th>
                    <th class="col-md-2"></th>
                    <th class="col-md-7"></th>
                    <th class="col-md-1"></th>
                </tr>
                </thead>
            <tbody>

            @foreach ($titles as $title)
                @if($title->created_at > \Carbon\Carbon::today())
                    <tr class="text-primary">
                        <td>{{ $title->time }}</td>
                        <td>{{ $title->user->name }}</td>
                        <td>{{ $title->title }}</td>
                        <td>{!! link_to_action('TitlesController@show', 'Edit', [$customerId, $title->id]) !!}</td>
                    </tr>
                @elseif($title->created_at < \Carbon\Carbon::today())
                    <tr class="active text-muted">
                        <td>{{ $title->time }}</td>
                        <td>{{ $title->user->name }}</td>
                        <td>{{ $title->title }}</td>
                        <td></td>
                    </tr>

                @endif
            @endforeach
            </tbody>
        </table>


@stop