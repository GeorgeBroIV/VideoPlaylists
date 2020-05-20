@extends('_layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-auto">
				<div class="card">
					<div class="card-header">
						Admin Settings - '{{ env('APP_NAME') }}' Users
					</div>
					<div class="card-body">
                        <form action="" method="post">
                            @method('edit')
                            @csrf
                            <table>
                                @include('Admin.user.tablehead')
                                @foreach($users as $user)
                                    <tr>
                                        <td style="padding-left: 10px; padding-right: 10px">
                                            {{ $user->firstname }}
                                        </td>
                                        <td style="padding-left: 10px; padding-right: 10px">
                                            {{ $user->lastname }}
                                        </td>
                                        <td style="padding-left: 10px; padding-right: 10px">
                                            {{ $user->username }}
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
<!--
                                        at_for($i = 0; $i < count($roles); $i++)
                                            <td align="center" style="padding-left: 5px; padding-right: 5px">
                                                at_if(in_array($roles[$i]->name, $userRoles[$loop->index]))
                                                    at_if($roles[$i]->active == 1)
                                                        <input type="checkbox" id="" name="" value="" checked>
                                                    at_elseif($roles[$i]->active == 0)
                                                        <input type="checkbox" id="" name="" value="" disabled>
                                                    at_endif
                                                at_else
                                                    at_if($roles[$i]->active == 1)
                                                        <input type="checkbox" id="" name="" value="">
                                                    at_elseif($roles[$i]->active == 0)
                                                        <input type="checkbox" id="" name="" value="" disabled>
                                                    at_endif
                                                at_endif
                                            </td>
                                        at_endfor
-->
                                        <td align="center" style="padding-left: 10px; padding-right: 10px">
                                            Edit
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </form>
					</div>
				</div>
            </div>
		</div>
	</div>
@endsection
