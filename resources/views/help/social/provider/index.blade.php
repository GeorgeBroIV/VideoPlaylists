@extends('_layouts.app')
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
                                    @include('help.social.provider.tablehead')
									    @foreach($providers as $provider)
										<tr>
											<td style="padding-left: 10px; padding-right: 10px">
												{{ $provider->providerfriendly }}
											</td>
                                            <td align="center" style="padding-left: 10px; padding-right: 10px">
                                                @if($provider->api == 1)
                                                    <a href="{{ route('api') }}">
                                                        Yes
                                                    </a>
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td align="center" style="padding-left: 10px; padding-right: 10px">
                                                @if($provider->scopes == 1)
                                                    <a href="{{ route('scopes') }}">
                                                        Yes
                                                    </a>
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
                                            <td style="padding-left: 10px; padding-right: 10px">
                                                {{ $provider->notes }}
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
