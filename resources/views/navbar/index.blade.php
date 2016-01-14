@if(Auth::check())
    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">

        <li>{!!  link_to_action('CustomersController@create', 'New contributer', ["id" => Auth::user()->id])  !!}</li>
        <li><a href="#!">two</a></li>
        <li class="divider"></li>
        <li>{!! link_to_route('logout', 'Logout')!!}</li>
    </ul>
@endif
<nav>
    <div class="nav-wrapper deep-orange lighten-3">
        <a href="#!" class="brand-logo">Scheduler</a>
        <ul class="right hide-on-med-and-down">
            <!-- Dropdown Trigger -->
            @if(Auth::check())
            <li>
                <a class="dropdown-button" href="#!" data-activates="dropdown1">Menu<i class="material-icons right">arrow_drop_down</i></a>
            </li>
            @endif

        </ul>
    </div>
</nav>


{{--<nav class="navbar navbar-default">--}}
    {{--<div class="container-fluid">--}}
        {{--<!-- Brand and toggle get grouped for better mobile display -->--}}
        {{--<div class="navbar-header">--}}
            {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">--}}
                {{--<span class="sr-only">Toggle navigation</span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
            {{--</button>--}}
            {{--@if(Auth::check())--}}
                {{--{!! link_to_route('admin', 'Scheduler', ["id" => Auth::user()->id], ["class" => "navbar-brand"] ) !!}--}}
            {{--@elseif (!Auth::check())--}}
                {{--<div class="navbar-brand">Scheduler</div>--}}
            {{--@endif--}}
        {{--</div>--}}

        {{--@if(Auth::check())--}}
        {{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
        {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>--}}
                {{--<li><a href="#">Link</a></li>--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{ $customer->first_name }} <span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li>{!!  link_to_action('CustomersController@create', 'New contributer', ["id" => Auth::user()->id])  !!}</li>--}}
                        {{--<li><a href="#">Another action</a></li>--}}
                        {{--<li><a href="#">Something else here</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li><a href="#">Separated link</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li>--}}
                            {{--{!! link_to_route('logout', 'Logout')!!}--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div><!-- /.navbar-collapse -->--}}
        {{--@endif--}}
    {{--</div><!-- /.container-fluid -->--}}
{{--</nav>--}}