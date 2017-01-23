@extends('auth.layout', ['title' => trans('auth.reset.change_title')])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ trans('auth.reset.change_title') }}</h4>
                </div>

                {!! BootForm::openHorizontal(['md' => [4, 6]]) !!}
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="panel-body">
                        {!! BootForm::email(trans('auth.login.email'), 'email')->required()->autofocus() !!}
                        {!! BootForm::password(trans('auth.login.password'), 'password')->required() !!}
                        {!! BootForm::password(trans('auth.reset.confirm'), 'password_confirmation')->required() !!}
                    </div>

                    <div class="panel-footer text-right">
                        <button type="submit" class="btn btn-primary">{{ trans('auth.reset.change') }}</button>
                    </div>
                {!! BootForm::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
