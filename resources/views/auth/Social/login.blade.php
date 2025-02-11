@extends('_layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Social Provider Login
                    </div>
                    <div id="divProviderLogin" class="card-body">
                        <p>
                            Hi {{ $users->firstname }}, welcome to the {{ env('APP_NAME') }} 'Social Provider' login area.
                        </p>
                        <p>
                            Now that you've logged in to our site, you have the option to log into additional service providers by clicking on the
                            @if(count($providers) > 1)
                                buttons
                            @else
                                button
                            @endif
                            below.  This will be useful if you wish to have access to content.
                        </p>
                        <div align="center">
                            @if(isset($providers))
                                <form method="POST" action="{{ route('social.oauth') }}">
                                    @csrf
                                    @foreach($providers as $provider)
                                        <span id="socialProviders">
                                            <button id="{{ $provider->provider }}" name="{{ $provider->provider }}" type="submit" class="btn btn-default">
                                                <img height="30px" src="./img/Button-{{ $provider->providerfriendly }}-bg-out.png">
                                            </button>
                                        </span>
                                    @endforeach
                                </form>

                                @if(isset($socialLoggedIn))
                                    <h1>Logged in with {{ $socialLoggedIn }}</h1>
                                @endif

                            @else
                                <h4>
                                    Currently there are no active social providers available.
                                </h4>
                                <h5>
                                    Please check back soon!
                                </h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
