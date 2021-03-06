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
                    <tr id="votes">
                        <td>{{ \Carbon\Carbon::parse($title->time)->format('d.m.') }}</td>
                        {{--<td id="id">{{ $title->id}}</td>--}}
                        <td>{{ $title->user->name }}</td>
                        <td>{{ $title->title }}</td>
                        <td id="downVote"><i id="{{ $title->id }}" class="tiny material-icons red-text">thumb_down</i></td>
                        <td id="numVote{{ $title->id }}" >{{ $title->votes }}</td>
                        <td id="upVote"><i id="{{ $title->id }}" class="tiny material-icons green-text">thumb_up</i></td>
                        <td>{!! link_to_action('TitlesController@show', 'Edit', [$customer, $title->id]) !!}</td>
                    </tr>
                @endif
            @endforeach
            @foreach($titles->slice(0,10) as $title)
                @if($title->created_at < \Carbon\Carbon::today())
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

    var url = "{{ url("/") }}" + "/{{ Auth::user()->id }}" + "/titles"


     $("#upVote i").on("click", function() {

        var $id = this.id;
        $.ajax({
            type: 'POST',
            url: url + "/upvote" + "/" + $id,
            success: function (data) {
//                console.log($id);
                $('#numVote' + $id).html(data);
            }
        });

    });

    $("#downVote i").on("click", function() {
        var $id = this.id;

        $.ajax({
            type: 'POST',
            url: url + "/downvote" + "/" + $id,
            success: function(data) {
                $("#numVote" + $id).html(data);

            }
        });
    });


</script>
@stop