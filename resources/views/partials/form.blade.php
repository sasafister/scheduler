@if(count($user) == 1)
    {{--{!! Form::select('author', $user, null, ['class' => 'form-control']) !!}--}}
@else
    {!! Form::select('author', $user, "0", ['class' => 'form-control']) !!}
@endif

    <div class="form-group">
        {!! Form::text('title', null, ['class' => 'form-control', 'style' => 'width:395px', 'placeholder' => 'Tematika / Članak']) !!}
    </div>

    {{--Clock--}}
    <div class="input-group clockpicker col-md-2">
        {!! Form::text('time', $time, ['class' => 'form-control']) !!}
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
        </span>
    </div>
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-default']) !!}