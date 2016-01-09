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
                @if($title->time >= \Carbon\Carbon::today())
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($title->time)->format('d.m.') }}</td>
                        {{--<td id="id">{{ $title->id}}</td>--}}
                        <td>{{ $title->user->name }}</td>
                        <td>{{ $title->title }}</td>
                        <td id="downVote"><i id="{{ $title->id }}" class="tiny material-icons">thumb_down</i></td>
                        <td id="numVote">{{ $title->votes }}</td>
                        <td id="upVote"><i id="{{ $title->id }}" class="tiny material-icons">thumb_up</i></td>
                        <td>{!! link_to_action('TitlesController@show', 'Edit', [$customer, $title->id]) !!}</td>
                    </tr>
                @elseif($title->time < \Carbon\Carbon::today())
                    <tr class="grey-text">
                        <td>{{ \Carbon\Carbon::parse($title->time)->format('d.m.') }}</td>
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

    $("#upVote i").on("click", function() {

        $.ajax({
            type: 'POST',
            url: '/upvote/' + this.id,
            success: function(data) {
                $('#numVote').html(data);
//                $(this).html('<p> Your article was successfully added!</p>');
            }
        });
    });
    $("#downVote i").on("click", function() {
        $.ajax({
            type: 'POST',
            url: '/downvote/' + this.id,
            success: function(data) {
                $("#numVote").html(data);

            }
        });
    });


</script>
@stop