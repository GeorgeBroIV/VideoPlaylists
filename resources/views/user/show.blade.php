@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-auto">
				<div class="card">
					<div class="card-header">
						{{ env('APP_NAME') }} User Information
					</div>
					<div class="card-body">
						<table>
							@include('user.tablehead')
							<tr>
								<td style="padding-left: 10px; padding-right: 10px">
									{{ $users->userid }}
								</td>
								<td style="padding-left: 10px; padding-right: 10px">
									{{ $users->firstname }}
								</td>
								<td style="padding-left: 10px; padding-right: 10px">
									{{ $users->lastname }}
								</td>
								<td style="padding-left: 10px; padding-right: 10px">
									{{ $users->email }}
								</td>
								<td align="center" style="padding-left: 10px; padding-right: 10px">
									@if($users->active == 1)
										Yes
									@else
										No
									@endif
								</td>
								<td align="center" style="padding-left: 10px; padding-right: 10px">
									@if($users->admin == 1)
										Yes
									@else
										No
									@endif
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection