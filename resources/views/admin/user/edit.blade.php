@extends('_layouts.app')

@section('content')
    @isAdmin
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-auto">
                    <div class="card">
                        <div class="card-header">
                            Edit {{ Auth::user()->firstname }}'s Settings
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                @method('edit')
                                @csrf
                                <table>
                                    @include('admin.user.tablehead')
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
                                            @for($i = 0; $i < count($roles); $i++)
                                                <td align="center" style="padding-left: 5px; padding-right: 5px">
                                                    @if(in_array($roles[$i]->name, $userRoles[$loop->index]))
                                                        @if($roles[$i]->active == 1)
                                                            <input type="checkbox" id="" name="" value="" checked>
                                                        @elseif($roles[$i]->active == 0)
                                                            <input type="checkbox" id="" name="" value="" disabled>
                                                        @endif
                                                    @else
                                                        @if($roles[$i]->active == 1)
                                                            <input type="checkbox" id="" name="" value="">
                                                        @elseif($roles[$i]->active == 0)
                                                            <input type="checkbox" id="" name="" value="" disabled>
                                                        @endif
                                                    @endif
                                                </td>
                                            @endfor
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
    @endisAdmin
@endsection
