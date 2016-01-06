@extends('master')

@section('content')

    <h1>Zimo Scheduler</h1>
        <div>
        {!!  Form::open(["method" => "POST", "action" => ["TitlesController@store", $customer]]) !!}
           @include('partials.form', ['submitButtonText' => 'Planiraj', 'user' => $allUsers, 'time' => ''])
        {!! Form::close() !!}

        {{--div od unutarnje forme--}}
        </div>


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
                    <tr class="">
                        <td class="">{{ \Carbon\Carbon::parse($title->time)->format('d.m.') }}</td>
                        <td>{{ $title->user->name }}</td>
                        <td>{{ $title->title }}</td>
                        <td>{!! link_to_action('TitlesController@show', 'Edit', [$customer, $title->id]) !!}</td>
                    </tr>
                @elseif($title->created_at < \Carbon\Carbon::today())
                    <tr class="grey-text">
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
