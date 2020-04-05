@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
	
				@guest
	            <div id="divSiteLogin" class="card-body">
		            <p>Welcome to the <title>{{ env('APP_NAME')  }}</title> main login area.</p>
		            <p>Once you register or login with us, you have the option to log yourself in with
			            additional service providers.  This will be useful if you wish to have access to
			            provider-specific content within this web application.</p>
		            <hr><br>
		            <form method="POST" action="{{ route('login') }}">
			            @csrf
			            <div class="form-group row">
				            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
				
				            <div class="col-md-6">
					            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
					
					            @error('email')
					            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
					            @enderror
				            </div>
			            </div>
			
			            <div class="form-group row">
				            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
				
				            <div class="col-md-6">
					            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
					
					            @error('password')
					            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
					            @enderror
				            </div>
			            </div>
			
			            <div class="form-group row">
				            <div class="col-md-6 offset-md-4">
					            <div class="form-check">
						            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
						
						            <label class="form-check-label" for="remember">
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
					            @if (Route::has('password.request'))
						            <a class="btn btn-link" href="{{ route('password.request') }}">
							            {{ __('Forgot Your Password?') }}
						            </a>
					            @endif
				            </div>
			            </div>
		            </form>
	            </div>
				@endguest
	            @auth
	            <div id="divProviderLogin" class="card-body">
		            <p>Hi {{ \Illuminate\Support\Facades\Auth::user()->firstname }}, welcome to the {{ env
		            ('APP_NAME')  }} 'Service Provider'
			            login area.</p>
		            <p>Now that you've logged in to our site, you have the option to log into additional service
			            providers.  This will be useful if you wish to have access to content.</p>
		            <div align="center">
			            <span id="socialProviders">
			            <a href="{{ route('social.oauth', 'facebook') }}" class="btn btn-default">
				            Facebook
			            </a>
			            <a href="{{ route('social.oauth', 'twitter') }}" class="btn btn-default">
				            Twitter
			            </a>
			            <a href="{{ route('social.oauth', 'google') }}" class="btn btn-default">
				            Google
			            </a>
			            <a href="{{ route('social.oauth', 'github') }}" class="btn btn-default">
				            Github
			            </a>
		            </span>
		            </div>
	            </div>
				@endauth
            </div>
        </div>
    </div>
</div>
@endsection
