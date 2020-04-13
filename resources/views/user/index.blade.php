@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-auto">
				<div class="card">
					<div class="card-header">
						List Users
					</div>
					<div class="card-body">
						<table>
							@include('user.tablehead')
							@foreach($users as $user)
								<tr>
									<td style="padding-left: 10px; padding-right: 10px">
										{{ $user->userid }}
									</td>
									<td style="padding-left: 10px; padding-right: 10px">
										{{ $user->firstname }}
									</td>
									<td style="padding-left: 10px; padding-right: 10px">
										{{ $user->lastname }}
									</td>
									<td style="padding-left: 10px; padding-right: 10px">
										{{ $user->email }}
									</td>
									<td align="center" style="padding-left: 10px; padding-right: 10px">
										@if($user->active == 1)
											Yes
										@else
											No
										@endif
									</td>
									<td align="center" style="padding-left: 10px; padding-right: 10px">
										@if($user->admin == 1)
											Yes
										@else
											No
										@endif
									</td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
