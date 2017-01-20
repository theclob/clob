@extends('auth.layout', ['title' => trans('auth.login.title')])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ trans('auth.login.title_verbose') }}</h4>
                </div>
                {!! BootForm::openHorizontal(['md' => [4, 6]]) !!}
                    {{ csrf_field() }}
                    <div class="panel-body">
                        @include('common.alerts')
                        {!! BootForm::email(trans('auth.login.email'), 'email')->required()->autofocus() !!}
                        {!! BootForm::password(trans('auth.login.password'), 'password')->required() !!}
                        {!! BootForm::checkbox(trans('auth.login.remember'), 'remember') !!}
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary pull-right">{{ trans('auth.login.login') }}</button>
                        <a class="btn btn-link" href="{{ route('admin.auth.forgot') }}">{{ trans('auth.login.forgot') }}</a>
                    </div>
                {!! BootForm::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
