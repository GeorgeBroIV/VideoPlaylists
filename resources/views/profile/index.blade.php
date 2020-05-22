@extends('_layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $user->displayname }}'s Profile</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('profile.edit') }}" method="POST" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <!-- User Name (disabled) -->
                                        <!-- TODO Add Ability to Change User Name, with validation constraints -->
                                            <div class="form-group row">
                                                <label for="username" class="col-md-4 col-form-label text-md-right">User Name</label>
                                                <div class="col-md-6">
                                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}" disabled>
                                                </div>
                                            </div>
                                        <!-- END User Name -->
                                        <!-- E-mail (disabled) -->
                                        <!-- TODO Add Ability to Change E-mail, with validation constraints (including unique), delete 'e-mail verified', change 'role', and once verified change 'role' to previous -->
                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                                <div class="col-md-6">
                                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}" disabled>
                                                </div>
                                            </div>
                                        <!-- END E-mail -->
                                        <!-- First Name -->
                                            <div class="form-group row">
                                                <label for="firstname" class="col-md-4 col-form-label text-md-right">First Name</label>
                                                <div class="col-md-6">
                                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname', $user->firstname) }}" autofocus>
                                                </div>
                                            </div>
                                        <!-- END First Name -->
                                        <!-- Last Name -->
                                            <div class="form-group row">
                                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                                <div class="col-md-6">
                                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname', $user->lastname) }}">
                                                </div>
                                            </div>
                                        <!-- END Last Name -->
                                        <!-- Display Name -->
                                            <div class="form-group row">
                                                <label for="displayname" class="col-md-4 col-form-label text-md-right">Display Name</label>
                                                <div class="col-md-6">
                                                    <input id="displayname" type="text" class="form-control" name="displayname" value="{{ old('displayname', $user->displayname) }}">
                                                </div>
                                            </div>
                                        <!-- END Display Name -->
                                        <!-- Avatar -->
                                            <div class="form-group row">
                                                @if ($user->avatar)
                                                    <div class="col-md-4 text-md-right">
                                                        <img src="{{ asset('storage/'.$user->avatar) }}" style="width: 40px; height: 40px; border-radius: 50%">
                                                    </div>
                                                    <span class="col-md-6" style="vertical-align: center">
                                                        <label for="avatar" style="cursor: pointer" class="btn btn-dark">
                                                            Change
                                                        </label>
                                                        <input id="avatar" type="file" class="form-control" name="avatar" style="visibility: hidden; opacity: 0; position: absolute; z-index: -1">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                        <label for="avatarDelete">
                                                            Delete
                                                        </label>
                                                        <input id="avatarDelete" name="avatarDelete" type="checkbox">
                                                    </span>
                                                @else
                                                    <label for="avatar" class="col-md-4 col-form-label text-md-right">
                                                        Avatar
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input id="avatar" type="file" class="form-control" name="avatar">
                                                    </div>
                                                @endif
                                            </div>
                                        <!-- END Avatar -->
                                        <!-- Submit or Cancel -->
                                            <div class="form-group row mb-0 mt-5">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Edit Profile
                                                    </button>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <a href="{{ route('profile') }}" class="btn btn-secondary">
                                                        Cancel
                                                    </a>
                                                </div>
                                            </div>
                                        <!-- END Submit or Cancel -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
