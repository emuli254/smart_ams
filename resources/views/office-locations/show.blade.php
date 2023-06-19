{{-- @extends('adminlte::page') --}}
@extends('layouts.app', ['activePage' => 'dashboard', 'title' => 'ODPP AMS | Location', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('title', 'Location')

@section('content_header')
    <h1>Office location {{$location->name}}</h1>
@stop

@section('content')

@include('includes.messages')

    <div class="row">
        <div class="col-sm-3">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Item location {{$location->name}}</h3>
                </div>
                <div class="box-body">
                    <dl class="dl-vertical">
                        <dt>Location name</dt>
                        <dd>{{$location->name}}</dd>
                        <dt>County</dt>
                        <dd>{{$location->county}} {{$location->subcounty}}</dd>
                        <dt>Street / Road</dt>
                        <dd>{{$location->street}}</dd>
                        <dt>Building</dt>
                        <dd>{{$location->building}}</dd>
                        <dt>Office Code</dt>
                        <dd>{{$location->office_code}}</dd>
                        <dt>Created at</dt>
                        <dd>{{$location->created_at}}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-sm-9">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Items at Office Location {{$location->name}}</h3>
                </div>
                <div class="box-body">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item name</th>
                                <th>Buy-in price</th>
                                <th>Instock</th>
                                <th>Discontinued</th>
                <th>Quantity at this location</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($stocks as $itemstock)
                                <tr>
                                    <td>{{$itemstock->id}}</td>
                                    <td>{{$itemstock->item->name}}</td>
                                    <td>{{$itemstock->buy_price}}</td>
                                    <td>
                                        @if ($itemstock->in_stock == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        @if ($itemstock->discontinued == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>{{$itemstock->where('office_location_id', $location->id)->count() }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
	<script src="{{asset('js/render_datatables.js')}}" charset="utf-8"></script>
@endsection
