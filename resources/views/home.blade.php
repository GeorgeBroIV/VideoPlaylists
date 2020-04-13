@extends('layouts.app')

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
                        <p>Hi {{ Auth()->user()->firstname }}, you are now logged into the <strong>{{ env('APP_NAME') }}</strong> web application.</p>
                        <p>You can now log into additional Social Providers (Google, etc) to incorporate streamlined features of these providers into this web application by clicking the 'Social Login' button.</p>
	                </div>
	            </div>
		        <p></p>
		        <div class="  card">
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
