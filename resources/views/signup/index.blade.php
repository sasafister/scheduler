@extends('master')

@section('content')
        <!-- Content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <a class="logo" href="index.html"></a>
                    <h1><strong>Schedule</strong> Registration Form</h1>
                    <div class="description">
                        <p>
                            This is a scheduler for all your tasks. Simple & easy to use. No need for manual.
                        </p>
                    </div>
                    <div class="top-big-link">
                        <a class="btn btn-link-1 launch-modal" href="#" data-modal-id="modal-register">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- MODAL -->
<div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h3 class="modal-title" id="modal-register-label">Sign up now</h3>
                <p>Fill in the form below to get instant access:</p>
            </div>

            <div class="modal-body">

                    {!! Form::open(['method' => 'POST', 'action' => 'CustomersController@store', 'class' => 'registration-form']) !!}

                    <div class="form-group">
                        <label class="sr-only" for="form-first-name">First name</label>
                        <input type="text" name="form_first_name" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-last-name">Last name</label>
                        <input type="text" name="form_last_name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-email">Email</label>
                        <input type="text" name="form_email" placeholder="Email..." class="form-email form-control" id="form-email">
                    </div>
                    <button type="submit" class="btn">Sign me up!</button>
                {!! Form::close() !!}


                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>

        </div>
    </div>
</div>

@stop