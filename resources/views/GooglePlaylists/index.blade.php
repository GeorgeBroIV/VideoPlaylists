@extends('layouts.app')

@section('content')

    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <meta name="google-signin-client_id" content="{{ env("GOOGLE_CLIENT_ID") }}">

    <div class="g-signin2" data-onsuccess="onSignIn"></div>


@endsection
