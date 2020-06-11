@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">
                <h1>{{ trans('panel.site_title_login') }}</h1>
                <p class="text-muted">{{ trans('global.login') }}</p>
                <span class="text-muted">Information login for developer :</span><br/>
                <span class="text-lowercase text-muted">{{ trans('global.username') }}</span><br/>
                <span class="text-lowercase text-muted">{{ trans('global.password') }}</span>


                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>

                        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    {{-- <div class="input-group mb-4">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                            <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                {{ trans('global.remember_me') }}
                            </label>
                        </div>
                    </div> --}}

                    <div class="row">
                        <div class="container">
                            <button type="submit" class="btn btn-block btn-primary btn-group-toggle">
                                {{ trans('global.button_login') }}
                            </button>
                        </div>
                        {{-- <div class="col-6 text-right">
                            @if(Route::has('password.request'))
                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                    {{ trans('global.forgot_password') }}
                                </a><br>
                            @endif

                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
        <div class="card-header">
            <h5 class="card-title">3PS API Development</h5>
            <p class="card-text">Prototype api development tiga permata sistem.</p>
            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
            <a href="{{ route("l5-swagger.api") }}" class="nav-link {{ request()->is('admin/api/documentation') || request()->is('admin/api/*') ? 'active' : '' }}">
                <i class="fa-fw fas fa-bookmark nav-icon">
                </i>
                    {{ trans('cruds.publish_api.title') }}
            </a>
          </div>
    </div>
</div>
@endsection