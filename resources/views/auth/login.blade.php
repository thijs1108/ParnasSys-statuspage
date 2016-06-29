@extends('layout.clean')

@section('bodyClass', 'login')

@section('content')
    <div class="container">
        <div class="row">
            <div class="form-bg">
                <div class="logo">
                    <img src="/statuspage/public/img/logo-parnassys_wide.png" width="320">
                </div>

                <br>

                <div class="panel">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3>Log In</h3>
                        </div>
                        <br>
                        <form method="POST" action="{{ URL::asset(route('auth.login', [], false)) }}" accept-charset="UTF-8" autocomplete="off" name="{{ str_random(10) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @if(Session::has('error'))
                            <p>{{ Session::get('error') }}</p>
                            @endif

                            <div class="form-group">
                                <label class="sr-only">{{ trans('forms.login.login') }}</label>
                                <input autocomplete="off" class="form-control login-input" placeholder="{{ trans('forms.login.login') }}" required="required" name="login" type="text" value="{{ Binput::old('login') }}" autofocus>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">{{ trans('forms.login.password') }}</label>
                                <input autocomplete="off" class="form-control login-input" placeholder="{{ trans('forms.login.password') }}" required="required" name="password" type="password" value="">
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <a class="btn btn-default btn-lg btn-trans" href="{{ route('status-page') }}">
                                            <span class="text-center">
                                                <i class="ion ion-home"></i>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-xs-10">
                                        <button type="submit" class="btn btn-info btn-lg btn-block btn-trans">{{ trans('dashboard.login.login') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
