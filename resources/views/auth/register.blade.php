@extends('layouts._landerv2_blank')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{ trans( 'auth.register.form_title' ) }}
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans( 'auth.register.fields.name' ) }}</label>

                                <div class="">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6 {{ $errors->has('secondName') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans( 'auth.register.fields.secondName' ) }}</label>

                                <div class="">
                                    <input type="text" class="form-control" name="secondName" value="{{ old('secondName') }}">

                                    @if ($errors->has('secondName'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('secondName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 {{ $errors->has('surName') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans( 'auth.register.fields.surName' ) }}</label>

                                <div class="">
                                    <input type="text" class="form-control" name="surName" value="{{ old('surName') }}">

                                    @if ($errors->has('surName'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('surName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="form-group col-md-6  {{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="control-label">{{ trans( 'auth.register.fields.type' ) }}</label>

                            <div class="">
                                <select type="text" class="form-control" name="type">
                                    <option value="parent" default>{{ trans( 'auth.register.label.type.parent' ) }}</option>
                                    <option value="worker">{{ trans( 'auth.register.label.type.worker' ) }}</option>
                                </select>

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="control-label">{{ trans( 'auth.register.fields.email' ) }}</label>

                            <div class="">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="form-group col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="control-label">{{ trans( 'auth.register.fields.password' ) }}</label>

                            <div class="">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="control-label">{{ trans( 'auth.register.fields.password_confirmation' ) }}</label>

                            <div class="">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>{{ trans( 'auth.register.form_submit' ) }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
