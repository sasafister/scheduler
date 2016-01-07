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
                </tr>
                </thead>
            <tbody>

            @foreach ($titles as $title)
                @if($title->created_at > \Carbon\Carbon::today())
                    <tr class="">
                        <td class="">{{ \Carbon\Carbon::parse($title->time)->format('d.m.') }}</td>
                        <td id="id">{{ $title->id}}</td>
                        <td>{{ $title->user->name }}</td>
                        <td>{{ $title->title }}</td>
                        <td><i id="upVote" class="tiny material-icons">thumb_down</i></td>
                        <td id="numVote">{{ $title->votes }}</td>
                        <td><a href="#"><i class="tiny material-icons">thumb_up</i></td></a>
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

        var upvote = {
            vote: $("#numVote").text(),
            id: $("#id").text()
        };

        console.log(upvote);

        $("#upVote").on("click", function() {
            $.ajax({
                type: 'POST',
                url: '/upvote',
                data: upvote,
                success: function(response) {
                    console.log(response);
                }
            });
        });


</script>
@stop