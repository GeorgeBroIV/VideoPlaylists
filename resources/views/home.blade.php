@extends('_layouts.app')

@section('content')
    <p class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>
                            Hi {{ Auth::user()->firstname }}, you are now logged into the {{ env('APP_NAME') }} web application.
                        </p>
                        @if (isset($message) && $message == "CSRF token mismatch.")
                            You've been redirected here due to the following error: "{{ $message }}".  Likely this was caused due to inactivity, welcome back!
                        @elseif (isset($message))
                            You've been redirected here due to the following error: "{{ $message }}".  If this was unexpected please send a quick e-mail to {{ env('WEBMASTER') }}.
                        @endif

                            @isAdmin
                                <p>
                                    As an Admin you have full access to all capabilities of this website, including all permissions granted
                                    to 'Reviewer' and 'Verified' users.
                                </p>
                            @else
                                @isVerified
                                <p>
                                    As a Verified user, you can now
                                @else
                                    <p>
                                        Once you verify your e-mail address with this system (check your e-mail) you'll be able to
                                @endisVerified
                                        log into additional Social Providers (Google, etc) to incorporate streamlined features of these providers into
                                        this web application
                                @isVerified
                                        by clicking on 'Social Login' under '{{ Auth::user()->firstname }}' in the top Navigation Bar.
                                    </p>
                                @else
                                    .
                                    </p>
                                @endisVerified
                            @endisAdmin
                        </p>
                    </div>
                </div>
                <p></p>
                <div class="card">
                    <div class="card-header">
                        {{ env('APP_NAME') }} Home Page
                    </div>
                    <div class="card-body">
                        <p>
                            Develop Content.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
