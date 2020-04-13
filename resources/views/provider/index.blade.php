@extends('layouts.app')
<!-- TODO Change the atGuest to atAdmin -->
@auth
	@section('content')
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header">
							Social Providers
						</div>
						<div class="card-body">
								<table>
                                    @include('provider.tablehead')
									@foreach($providers as $provider)
										<tr>
                                            <td style="padding-left: 10px; padding-right: 10px">
                                                {{ $provider->provider }}
                                            </td>
											<td style="padding-left: 10px; padding-right: 10px">
												{{ $provider->providerfriendly }}
											</td>
                                            <td align="center" style="padding-left: 10px; padding-right: 10px">
                                                @if($provider->scopes == 1)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td align="center" style="padding-left: 10px; padding-right: 10px">
                                                @if($provider->active == 1)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td align="center" style="padding-left: 10px; padding-right: 10px">
                                                Edit
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
@endauth