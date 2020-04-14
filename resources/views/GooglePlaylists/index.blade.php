@extends('layouts.app')

@section('content')

    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <meta name="google-signin-client_id" content="{{ env("GOOGLE_CLIENT_ID") }}">

    <div class="g-signin2" data-onsuccess="onSignIn"></div>
    <div id="my-signin2"></div>
    <script>
        function onSuccess(googleUser) {
            console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
        }
        function onFailure(error) {
            console.log(error);
        }
        function renderButton() {
            gapi.signin2.render('my-signin2', {
                'scope': 'profile email https://www.googleapis.com/auth/youtube.readonly',
                'width': 240,
                'height': 50,
                'longtitle': true,
                'theme': 'dark',
                'onsuccess': onSuccess,
                'onfailure': onFailure
            });
        }
    </script>

@endsection
