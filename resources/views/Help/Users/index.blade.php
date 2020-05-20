@extends('_layouts.app')

<title>{{ config('app.name', 'Laravel') }}</title>


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Help Area - User Information
                    </div>
                    <div class="card-body">
                        <p>
                            The {{ config('app.name') }} 'User' information (which is independent of any optionally logged-in 'Social Provider' users)
                            is securely authenticated within this application code.  Along with associated web routing, this is protected by use of
                            middleware 'guards' whereith all client-server roundtrip paths utilizing SSL over https.
                        </p>
                        <p>
                            Each 'user' is assigned a collection of 'roles' (e.g. 'guest', 'registered', 'verified', 'admin', 'developer'), each role
                            having one or more associated 'permissions' (e.g. "can view this user's profile", "can edit all users' information").
                            These roles are protected by similar guards for each api/web routes and authentication.
                        </p>
                        <p>
                            Sensitive information (such as your password) are protected by encryption methods so that the storage of this information
                            (necessary for internal application authentication) is hashed.  The encryption method utilized within this web application
                            for encryption is <a href="https://en.wikipedia.org/wiki/Bcrypt">'Bcrype'</a> (as explained in Wikipedia).  This means
                            that the web server hosting this web application can only verify the user-supplied password in the active
                            server-token-based current session against the stored password located within a database on a different server (for
                            security purposes), where the stored password is hashed via BCrypt.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
