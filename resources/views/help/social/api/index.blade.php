@extends('_layouts.app')
<!-- TODO Change the atGuest to atAdmin -->
@auth
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Provider API's
                    </div>
                    <div class="card-body">
                        <table>
                            @include('help.social.api.tablehead')
                            @foreach($apis as $api)
                                <tr>
                                    <td style="padding-left: 5px; padding-right: 5px">
                                        {{ $api->provider }}
                                    </td>
                                    <td style="padding-left: 5px; padding-right: 5px">
                                        {{ $api->name }}
                                    </td>
                                    <td style="padding-left: 5px; padding-right: 5px">
                                        {{ $api->apiVer }}
                                    </td>
                                    <td style="padding-left: 5px; padding-right: 5px; word-wrap: break-word; width: 200px; max-width: 200px">
                                        {{ $api->notes }}
                                    </td>
                                    <td align="center" style="padding-left: 5px; padding-right: 5px">
                                        @if($api->active == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td align="center" style="padding-left: 5px; padding-right: 5px">
                                        @if($api->interested == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
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
