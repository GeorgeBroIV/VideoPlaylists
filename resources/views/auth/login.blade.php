@extends('_layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Login') }}
                    </div>

                    <div class="card-body">
                        @if(session('status'))
                            <p>You have been redirected here due to the following internal server error: "{{ session('status') }}"
                            @if(session('status') == "CSRF token mismatch.")
                                &nbsp;This error typically occurs if your session expired due to inactivity.
                            @endif
                            </p>
                            <p>If you intended to log out you may close this window, otherwise please log in again to continue.</p>
                            <hr>
                            <br>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="login" class="col-sm-4 col-form-label text-md-right">
                                    {{ __('User Name or Email') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="login" type="text" class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('username') ?: old('email') }}" required autofocus>

                                    @if($errors->has('username') || $errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Password') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>
                                                {{ $errors->first('password') }}
                                            </strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
