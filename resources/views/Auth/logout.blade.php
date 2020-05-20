@extends('_layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Logout
					</div>
					<div class="card-body">
						<p>
                            @if(isset($user))
                                Thank you {{ $user->firstname }},
                            @else
                                Thank you,
                            @endif
                            you have successfully logged out of the {{ env('APP_NAME') }} web application.
                        </p>
                        <p>
                            We hope you enjoyed your experience, come back real soon!
                        </p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
