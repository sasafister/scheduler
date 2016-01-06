@if(count($user) == 1)
    {{--{!! Form::select('author', $user, null, ['class' => 'form-control']) !!}--}}
@else
        <div class="row">
            @include("errors.error")
            <div class="input-field col s3">
            {!! Form::select('author', $user, "0", ['class' => 'icons left circle']) !!}

                {{--<select class="icons" name="author">--}}
                    {{--<option value="" disabled selected>Choose contributer</option>--}}
                    {{--@foreach($user as $cont)--}}
                         {{--<option value="{{$cont}}" data-icon="http://materializecss.com/images/sample-1.jpg" class="left circle" name="2">{{$cont}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
            </div>

            <div class="col s7">
                {!! Form::text('title', null, ['class' => 'validate', 'placeholder' => 'Tematika / Članak']) !!}

            </div>
            <div class="col s2">
                <input type="date" class="datepicker" placeholder="Pick a date" name="time">
            </div>
            <div class="col s12">
            {!! Form::submit($submitButtonText, ['class' => 'btn waces-effect waves-light']) !!}
            </div>

        </div>
@endif


    {{--Clock--}}
    {{--<div class="input-group clockpicker col-md-2">--}}
        {{--{!! Form::text('time', $time, ['class' => 'form-control']) !!}--}}
        {{--<span class="input-group-addon">--}}
            {{--<span class="glyphicon glyphicon-time"></span>--}}
        {{--</span>--}}
    {{--</div>--}}
