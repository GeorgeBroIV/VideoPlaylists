@extends('layouts.app')

@auth
	@section('content')
	<div class="container">
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
			                Hi {{ Auth()->user()->firstname }}, you are now logged into the <strong>{{ env('APP_NAME')
			                }}</strong> web application.  You can now log into additional providers (Google, etc) to
		                    have streamlined features of these providers available within this web application.
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
@elseauth
	<div class="row justify-content-center">
		<div class="col-md-8">
			
			<div class="card">
				<div class="card-header">
					Error
				</div>
				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
					@endif
					<p>
<? // TODO display javascript alert with subsequent redirect to /home -OR- a message here and a timed redirect ?>
						You have reached this page in error, please click <a href="/welcome">here</a> to redirect.
						e-mail to {{ env('WEBMASTER') }}
<? // TODO Add a record to errors table with all data and this location ?>
					</p>
				</div>
			</div>
		</div>
	</div>
@endauth