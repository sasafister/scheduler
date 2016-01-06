@extends('master')

@section('content')

    <h1>Zimo Scheduler</h1>

        {!!  Form::open(["method" => "POST", "action" => ["TitlesController@store", $customer]]) !!}
           @include('partials.form', ['submitButtonText' => 'Planiraj', 'user' => $allUsers])
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

@section('footer')
    <script>

        $(document).ready(function() {
            $('select').material_select();
//             $('.clockpicker').clockpicker({
//                donetext: "Done"
//             });
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year
                formatSubmit: 'yyyy-mm-dd'
            });
        });
            $('.modal-trigger').leanModal();
    </script>
@stop