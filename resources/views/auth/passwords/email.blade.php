@extends('auth.layout', ['title' => trans('auth.reset.title')])

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ trans('auth.reset.title_verbose') }}</h4>
                </div>
                {!! BootForm::openHorizontal(['md' => [4, 6]]) !!}
                    <div class="panel-body">
                        @include('common.alerts')
                        {!! BootForm::email(trans('auth.login.email'), 'email')->required()->autofocus() !!}
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary pull-right">{{ trans('auth.reset.send') }}</button>
                        <a class="btn btn-link" href="{{ route('admin.auth.login') }}">{{ trans('auth.reset.back') }}</a>
                    </div>
                {!! BootForm::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
