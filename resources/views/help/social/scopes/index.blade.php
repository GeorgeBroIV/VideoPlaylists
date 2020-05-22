@extends('_layouts.app')
<!-- TODO Change the atGuest to atAdmin -->
@auth
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        API Scopes
                    </div>
                    <div class="card-body">
                        <table>
                            @include('help.social.scopes.tablehead')
                            @foreach($scopes as $scope)
                                <tr>
                                    <td style="padding-left: 5px; padding-right: 5px">
                                        {{ $scope->provider }}
                                    </td>
                                    <td style="padding-left: 5px; padding-right: 5px">
                                        {{ $scope->api }}
                                    </td>
                                    <td style="padding-left: 5px; padding-right: 5px">
                                        {{ $scope->apiVer }}
                                    </td>
                                    <td style="padding-left: 5px; padding-right: 5px; word-wrap: break-word; max-width: 75px">
                                        {{ $scope->scopeShort }}
                                    </td>
                                    <td style="padding-left: 5px; padding-right: 5px; word-wrap: break-word; max-width: 150px">
                                        {{ $scope->scopeFull }}
                                    </td>
                                    <td style="padding-left: 5px; padding-right: 5px; word-wrap: break-word; width: 200px; max-width: 300px">
                                        {{ $scope->description }}
                                    </td>
                                    <td align="center" style="padding-left: 5px; padding-right: 5px">
                                        @if($scope->active == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td align="center" style="padding-left: 5px; padding-right: 5px">
                                        @if($scope->interested == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td style="padding-left: 5px; padding-right: 5px">
                                        {{ $scope->notes }}
                                    </td>
                                    <td align="center" style="padding-left: 5px; padding-right: 5px">
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
